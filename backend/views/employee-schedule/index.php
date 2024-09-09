<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use app\components\TableDataWidget;
use app\components\ModalWidget;
use common\models\Weather;
use yiister\gentelella\widgets\Panel;
use yii\helpers\Html;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use Carbon\Carbon;
use common\Helper\DateHelper;
use yii\web\View;
use common\models\News;

?>

<?= BreadcrumbWidget::widget([
  'title' => 'График работ',
]);
?>

<?= PanelWidget::start(); ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($searchModel, 'date')->widget(DatePicker::classname(), [
  'options' => ['placeholder' => 'Enter event time ...'],
  'pluginOptions' => [
    'autoclose' => true,
    'minViewMode' => 'months',
  ]
]); ?>

<?= Html::submitButton('Показать', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish(); ?>
<?php

//$daysInMonth = cal_days_in_month(CAL_GREGORIAN, Carbon::now()->month, Carbon::now()->year);
$date = Carbon::parse($searchModel->date);
$daysInMonth = Carbon::now()->month($searchModel->date ?? Carbon::now()->month)->daysInMonth;

?>

<?= PanelWidget::start(true, [
  'heading' => DateHelper::months($date->month).', '.$date->year
]); ?>

<?php

$currentDate = Carbon::now();

$table = '<table class="table table-responsive table-bordered">';
$table .= '<thead>';
$table .= '<tr>';
$table .= '<th></th>';
foreach (range(1, $daysInMonth) as $key => $item) {

  $date = Carbon::parse($searchModel->date);
  $date = Carbon::createFromDate($date->year, $date->month, $item);
  $table .= '<th class="text-center" style="'.($currentDate->day == $item && $currentDate->month == $date->month ? 'background-color:red;color:#fff': '').'">' . $item . '</th>';
}
$table .= '<th></th>';
$table .= '</tr>';
//Carbon::now()->dayOfWeek
$table .= '</thead>';
$table .= '<tbody>';
$table .= '<tr>';

$table .= '<td></td>';


foreach (range(1, $daysInMonth) as $key => $item) {

  $date = Carbon::createFromDate($date->year, $date->month, $item);
  $dayInWeek = date('N', strtotime($date->format('Y-m-d')));

  $table .= '<td class="text-center" style="' . (in_array($dayInWeek, [6, 7]) ? 'background-color:#cecece' : '') . '">' . DateHelper::dayInWeekShort($dayInWeek) . '</td>';
}

$table .= '</tr>';

foreach ([1] as $key => $employee) {

  $table .= '<tr>';
  $table .= '<td class="text-center">Админ</td>';

foreach (range(1, $daysInMonth) as $keyDay => $item) {

  $newsCount = News::find()
    ->where(['=', new \yii\db\Expression("created_at::date"), Carbon::today()->format('Y-m-'.$item)])->all();

  $newsToday = News::find()
    ->where(['=', new \yii\db\Expression("date::date"), Carbon::today()->format('Y-m-'.$item)])->all();


  $table .= '<td class="text-center"><span style="color:#009ef7">'.count($newsCount).'</span>/'.count($newsToday).'</td>';
}
  $table .= '</tr>';
}
$table .= '</tbody>';
$table .= '</table>';

echo $table;

?>

<?php PanelWidget::finish(); ?>

<div class="modal" tabindex="-1" id="employeeHours">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Часы работы</h3>

        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
        <!--end::Close-->
      </div>

      <div class="modal-body">
        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
             data-kt-scroll-dependencies="#kt_modal_new_address_header"
             data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"
             style="max-height: 283px;">

          <!--begin::Input group-->
          <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-12 fv-row fv-plugins-icon-container">
              <!--begin::Label-->
              <label class="required fs-5 fw-semibold mb-2">Введите часы работы</label>
              <!--end::Label-->

              <!--begin::Input-->
              <input type="text" class="form-control form-control-solid employee-hour-value" placeholder=""
                     name="hours">
              <!--end::Input-->
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>
            <!--end::Col-->

          </div>
          <!--end::Input group-->

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary employee-save" onclick="setHours(this)" data-employee-id=""
                data-employee-hour="" data-date="">Сохранить
        </button>
      </div>
    </div>
  </div>
</div>

<?php

$script = <<< JS

    function clickHours(element) {

        let date = $(element).attr("data-date");
        let employeeId = $(element).attr("data-employee-id");
        let hours = $(element).attr("data-employee-hour");

        $('#employeeHours').find('.employee-save').attr("data-date", date);
        $('#employeeHours').find('.employee-save').attr("data-employee-id", employeeId);
        $('#employeeHours').find('.employee-save').attr("data-employee-hour", hours);
        $('.employee-hour-value').val(hours);
        $('#employeeHours').modal('show');
    }

    function setHours(element) {

      let date = $(element).attr("data-date");
      let employeeId = $(element).attr("data-employee-id");
      let hours = $('.employee-hour-value').val();

      $.post('employee-schedule/hours', {'date': date, 'employeeId':employeeId, 'hours': hours})
        .done(function (response) {

            let value = $('.employee-hour-value').val().trim();

            $('#employeeHours').modal('hide');
            $('#' + date + '-' + employeeId).html(value);

            if(Number.isInteger(value)) {

                $('#' + date + '-' + employeeId).css('background-color', '#90EE90');
            }


        }).fail(function (response) {

      });
    }
JS;

$this->registerJs($script, View::POS_END);
?>

<style>

  .table { border: 1px solid #2980B9; }
  .table thead > tr > th { border-bottom: none; }
  .table thead > tr > th, .table tbody > tr > th, .table thead > tr > td, .table tbody > tr > td { padding:8px !important; border: 1px solid #efefef !important; }

  .table td, .table th {
    border: 1px solid #2980B9;
  }

  .table{
    border: 1px solid #2980B9;
  }

  .day-off {
    color: red !important;
    weight: bold !important;
  }

</style>
