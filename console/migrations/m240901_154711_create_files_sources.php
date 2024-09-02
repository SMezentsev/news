<?php

use yii\db\Migration;

/**
 * Class m240901_154711_files_sources
 */
class m240901_154711_create_files_sources extends Migration
{

  public const TABLE_NAME = '{{%files_sources}}';
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $tableOptions = null;

    $table = Yii::$app->db->schema->getTableSchema(self::TABLE_NAME);
    if (null !== $table) {
//      $this->dropTable(self::TABLE_NAME);
    }

    $this->createTable(
      self::TABLE_NAME,
      [
        'id' => $this->primaryKey(),
        'name' => $this->text()->notNull()->comment('Источник'),
        "link" => $this->text()->null(),
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
