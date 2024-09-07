<?php

use yii\db\Migration;

/**
 * Class m240904_171604_update_news
 */
class m240904_171604_update_news extends Migration
{

  public const TABLE_NAME = '{{%news}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {

    $this->addColumn(static::TABLE_NAME, 'source_link',  $this->text()->null() );
  }
}
