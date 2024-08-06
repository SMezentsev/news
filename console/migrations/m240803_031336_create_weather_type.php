<?php

use yii\db\Migration;

/**
 * Class m240803_031336_create_weather_type
 */
class m240803_031336_create_weather_type extends Migration
{

  public const TABLE_NAME = '{{%weather_type}}';

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
        'show' => $this->tinyInteger()->null()->comment('Показать/скрыть')->defaultValue(0),
      ],
      $tableOptions
    );

    $this->insert(      self::TABLE_NAME, [ 'id' => 1, 'name' => 'Ясно']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 2, 'name' => 'Малооблачно, без осадков']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 3, 'name' => 'Облачно, небольшой дождь']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 4, 'name' => 'Малооблачно, небольшой дождь']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 5, 'name' => 'Облачно, дождь']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 6, 'name' => 'Малооблачно, дождь, гроза']);
    $this->insert(      self::TABLE_NAME, [ 'id' => 7, 'name' => 'Облачно']);

    $this->getDb()->createCommand('ALTER SEQUENCE weather_type_id_seq RESTART WITH 8')->execute();

  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable(self::TABLE_NAME);
  }
}
