<?php

use yii\db\Migration;

/**
 * Class m240803_031327_create_weather
 */
class m240803_031327_create_weather extends Migration
{
  public const TABLE_NAME = '{{%weather}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id'   => $this->primaryKey(),
        'value' => $this->integer()->notNull()->comment('Градус'),
        'city_id' => $this->integer()->notNull()->comment('Город'),
        'weather_type_id' => $this->integer()->notNull()->comment('Тип погоды'),
        'icon' => $this->text()->null()->comment('Иконка'),
        'text' => $this->text()->null()->comment('Описание'),
        'date' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
      ],
      $tableOptions
    );

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
