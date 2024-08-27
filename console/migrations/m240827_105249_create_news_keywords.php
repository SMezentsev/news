<?php

use yii\db\Migration;

/**
 * Class m240827_105249_create_news_keywords
 */
class m240827_105249_create_news_keywords extends Migration
{

  public const TABLE_NAME = '{{%news_keywords}}';
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
        'keyword_id' => $this->integer()->null()->comment('ID ключевых слов'),
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
