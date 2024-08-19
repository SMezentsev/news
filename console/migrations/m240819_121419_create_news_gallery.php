<?php

use yii\db\Migration;

/**
 * Class m240819_121419_create_news_gallery
 */
class m240819_121419_create_news_gallery extends Migration
{

  public const TABLE_NAME = '{{%news_gallery}}';
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
        'id'   => $this->primaryKey(),
        'news_id' => $this->integer()->null()->comment('ID новости'),
        'file_id' => $this->integer()->null()->comment('ID файла'),
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
