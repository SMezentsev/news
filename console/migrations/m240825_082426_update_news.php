<?php

use yii\db\Migration;

/**
 * Class m240825_082426_update_news
 */
class m240825_082426_update_news extends Migration
{

  public const TABLE_NAME = '{{%news}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
      $this->addColumn(static::TABLE_NAME, 'news_source_id',  $this->integer(7)
        ->null()
        ->defaultValue(0)
      );
  }
}
