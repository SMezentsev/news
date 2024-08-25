<?php

use yii\db\Migration;

/**
 * Class m240825_081750_create_news_sources
 */
class m240825_081750_create_news_sources extends Migration
{
  public const TABLE_NAME = '{{%news_sources}}';

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
        'id' => $this->primaryKey(),
        "name" => $this->text()->null(),
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
