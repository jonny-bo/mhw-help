<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weapons".
 *
 * @property int $id
 * @property string $name 武器名称
 * @property int $category_id 武器分类
 * @property int $level 稀有度
 * @property int $power 攻击力
 * @property int $sharpness 锐利度
 * @property int $heart_rate 会心率
 * @property int $inlay1 镶嵌槽1
 * @property int $inlay2 镶嵌槽2
 * @property int $inlay3 镶嵌槽3
 * @property int $defense 防御力
 */
class Weapons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weapons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'level', 'power', 'sharpness', 'heart_rate', 'inlay1', 'inlay2', 'inlay3', 'defense'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'level' => 'Level',
            'power' => 'Power',
            'sharpness' => 'Sharpness',
            'heart_rate' => 'Heart Rate',
            'inlay1' => 'Inlay1',
            'inlay2' => 'Inlay2',
            'inlay3' => 'Inlay3',
            'defense' => 'Defense',
        ];
    }
}
