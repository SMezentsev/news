<?php

use yii\db\Migration;

/**
 * Class m240826_174553_create_news_types
 */
class m240826_174553_create_news_types extends Migration
{

  public const TABLE_NAME = '{{%news_types}}';

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
        'name' => $this->string(255)->notNull()->comment('Наименование'),
        'description' => $this->text()->null()->comment('Описание типа'),
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Биография человека',
        'description' => 'Если в какой-то новости будет соответствующий ТЭГ, то, Будет вставляться в новости как ссылка на новость об этом человеке',
      ],
    );

    $this->getDb()->createCommand('ALTER SEQUENCE news_types_id_seq RESTART WITH 2')->execute();
  }
}
