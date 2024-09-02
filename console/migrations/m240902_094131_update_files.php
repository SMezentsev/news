<?php

use yii\db\Migration;

/**
 * Class m240902_094131_update_files
 */
class m240902_094131_update_files extends Migration
{

  public const TABLE_NAME = '{{%files}}';

  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->addColumn(static::TABLE_NAME, 'file_source_id',  $this->integer(7)
      ->null()
      ->defaultValue(0)
    );
  }
}
