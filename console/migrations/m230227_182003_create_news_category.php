<?php

use yii\db\Migration;

/**
 * Class m230227_182003_create_news_category
 */
class m230227_182003_create_news_category extends Migration
{
  public const TABLE_NAME = '{{%news_category}}';

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
        'eng_name' => $this->string(255)->notNull()->comment('Eng наименование'),
        'icon' => $this->text()->null()->comment('Иконка'),
        'parent_id' => $this->integer()->null()->comment('Родительский каталог'),
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(1)
      ],
      $tableOptions
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 1,
        'name' => 'Москва',
        'eng_name' => 'moscow',
        'parent_id' => 0
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 2,
        'name' => 'Все',
        'eng_name' => 'all',
        'parent_id' => 1
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 3,
        'name' => 'Политика',
        'eng_name' => 'politic',
        'parent_id' => 1
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 4,
        'name' => 'Общество',
        'eng_name' => 'society',
        'parent_id' => 1
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 5,
        'name' => 'Происшествия',
        'eng_name' => 'incidents',
        'parent_id' => 1
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 6,
        'name' => 'Конфликты',
        'eng_name' => 'conflicts',
        'parent_id' => 1
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 7,
        'name' => 'Преступность',
        'eng_name' => 'crime',
        'parent_id' => 1
      ]
    );

    $this->getDb()->createCommand('ALTER SEQUENCE news_category_id_seq RESTART WITH 8')->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
