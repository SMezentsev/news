<?php

use yii\db\Migration;

/**
 * Class m240802_202631_news_tags
 */
class m240802_202631_create_news_tags extends Migration
{

  public const TABLE_NAME = '{{%news_tags}}';
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
        'tag_id' => $this->integer()->null()->comment('ID тега'),
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
