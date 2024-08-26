<?php

use yii\db\Migration;

/**
 * Class m240826_190521_create_news_cycles
 */
class m240826_190521_create_news_cycles extends Migration
{
  public const TABLE_NAME = '{{%news_cycles}}';

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
        'name' => $this->string(255)->notNull()->comment('Наименование цикла'),
        'description' => $this->text()->null()->comment('Описание цикла новостей'),
      ],
      $tableOptions
    );

    $this->getDb()->createCommand('ALTER SEQUENCE news_cycles_id_seq RESTART WITH 1')->execute();
  }
}
