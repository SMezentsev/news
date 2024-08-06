<?php

use yii\db\Migration;

/**
 * Class m230429_182252_create_category_groups
 */
class m230429_182252_create_category_groups extends Migration
{

  public const TABLE_NAME = '{{%category_groups}}';

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
        'group_id' => $this->integer()->null()->comment('Группа'),
        'category_id' => $this->integer()->null()->comment('Категория'),
        'created_at' => $this->dateTime()->defaultExpression('current_timestamp')->comment('Дата создания'),
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
