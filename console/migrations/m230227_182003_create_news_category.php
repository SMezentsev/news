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

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 8,
        'name' => 'Мир',
        'eng_name' => 'world',
        'parent_id' => 0
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 9,
        'name' => 'Политика',
        'eng_name' => 'politic',
        'parent_id' => 8
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 10,
        'name' => 'Общество',
        'eng_name' => 'social',
        'parent_id' => 8
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 11,
        'name' => 'Происшествия',
        'eng_name' => 'accident',
        'parent_id' => 8
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 12,
        'name' => 'Конфликты',
        'eng_name' => 'conflict',
        'parent_id' => 8
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 13,
        'name' => 'Преступность',
        'eng_name' => 'crime',
        'parent_id' => 8
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 14,
        'name' => 'Экономика',
        'eng_name' => 'economics',
        'icon' => '<ion-icon name="trending-up-outline" role="img" class="md hydrated"                                                       aria-label="trending up outline"><template shadowrootmode="open"><div                                                   class="icon-inner"><svg xmlns="http://www.w3.org/2000/svg"                                                                           class="ionicon s-ion-icon"                                                                           viewBox="0 0 512 512"><path                                                       stroke-linecap="round" stroke-linejoin="round"                                                       d="M352 144h112v112"                                                       class="ionicon-fill-none ionicon-stroke-width"></path><path                                                       d="M48 368l121.37-121.37a32 32 0 0145.26 0l50.74 50.74a32 32 0 0045.26 0L448 160"                                                       stroke-linecap="round" stroke-linejoin="round"                                                       class="ionicon-fill-none ionicon-stroke-width"></path></svg></div></template></ion-icon>',
        'parent_id' => 0
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 15,
        'name' => 'Наука и техника	',
        'eng_name' => 'science',
        'parent_id' => 0
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 16,
        'name' => 'Культура',
        'eng_name' => 'culture',
        'parent_id' => 0
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 17,
        'name' => 'Путишествия',
        'eng_name' => 'travel',
        'parent_id' => 0
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 18,
        'name' => 'Преступность',
        'eng_name' => 'crime',
        'parent_id' => 0
      ]
    );
    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 19,
        'name' => 'Спорт',
        'eng_name' => 'sport',
        'icon' => '<ion-icon name="bicycle-outline" role="img" class="md hydrated"                                                       aria-label="bicycle outline"><template shadowrootmode="open"><div                                                   class="icon-inner"><svg xmlns="http://www.w3.org/2000/svg"                                                                           class="ionicon s-ion-icon"                                                                           viewBox="0 0 512 512"><path                                                       d="M388 288a76 76 0 1076 76 76.24 76.24 0 00-76-76zM124 288a76 76 0 1076 76 76.24 76.24 0 00-76-76z"                                                       stroke-miterlimit="10"                                                       class="ionicon-fill-none ionicon-stroke-width"></path><path                                                       stroke-linecap="round" stroke-linejoin="round"                                                       d="M256 360v-86l-64-42 80-88 40 72h56"                                                       class="ionicon-fill-none ionicon-stroke-width"></path><path                                                       d="M320 136a31.89 31.89 0 0032-32.1A31.55 31.55 0 00320.2 72a32 32 0 10-.2 64z"></path></svg></div></template></ion-icon>',
        'parent_id' => 0
      ]
    );

    $this->insert(
      self::TABLE_NAME,
      [
        'id' => 20,
        'name' => 'Здоровье',
        'eng_name' => 'health',
        'icon' => '<<ion-icon name="fitness-outline" role="img" class="md hydrated"                                                       aria-label="fitness outline"><template shadowrootmode="open"><div                                                   class="icon-inner"><svg xmlns="http://www.w3.org/2000/svg"                                                                           class="ionicon s-ion-icon"                                                                           viewBox="0 0 512 512"><path                                                       d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"                                                       stroke-linecap="round" stroke-linejoin="round"                                                       class="ionicon-fill-none ionicon-stroke-width"></path><path                                                       stroke-linecap="round" stroke-linejoin="round"                                                       d="M48 256h112l48-96 48 160 48-96 32 64h128"                                                       class="ionicon-fill-none ionicon-stroke-width"></path></svg></div></template></ion-icon>',
        'parent_id' => 0
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
