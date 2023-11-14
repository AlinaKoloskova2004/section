<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $telephone
 * @property string $surname_chilld
 * @property string $name_child
 * @property string $patronymic_child
 * @property string $age_child
 * @property int $category_id
 * @property int $section_id
 * @property int $status
 * @property int $user_id
 *
 * @property User $user
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic', 'telephone', 'surname_child', 'name_child', 'patronymic_child', 'age_child', 'category_id', 'section_id'], 'required'],
            [['category_id', 'section_id', 'status'], 'integer'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 255],
            [['telephone', 'age_child'], 'string', 'max' => 20],
            [['surname_child', 'patronymic_child'], 'string', 'max' => 35],
            [['name_child'], 'string', 'max' => 30],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()],

        ];
    }
    public function good()
    {
        $this->status=1;
        return $this->save(false);
    }
    public function verybed()
    {
        $this->status=2;
        return $this->save(false);
    }
    public function getStatus()
    {
        switch ($this->status){
            case 0:return 'Ожидание';
            case 1:return 'Принято';
            case 2:return 'Отклонено';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Фамилия'),
            'name' => Yii::t('app', 'Имя'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'telephone' => Yii::t('app', 'Телефон'),
            'category_id' => Yii::t('app', 'Возрастная категория'),
            'section_id' => Yii::t('app', 'Кружки'),
            'status' => Yii::t('app', 'Статус записи'),
            'surname_child' => Yii::t('app', 'Фамилия ребёнка'),
            'name_child' => Yii::t('app', 'Имя ребёнка'),
            'patronymic_child' => Yii::t('app', 'Отчество ребёнка'),
            'age_child' => Yii::t('app', 'Возраст ребёнка'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id'=>'section_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
