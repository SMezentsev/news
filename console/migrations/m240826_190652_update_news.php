<?php

use yii\db\Migration;

/**
 * Class m240826_190652_update_news
 */
class m240826_190652_update_news extends Migration
{

  public const TABLE_NAME = '{{%news}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addColumn(static::TABLE_NAME, 'news_cycle_id',  $this->integer(7)
      ->null()
      ->defaultValue(0)
    );
  }
}