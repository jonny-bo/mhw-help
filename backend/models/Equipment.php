<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $name 防具名称
 * @property int $group_id 所属套装id
 * @property int $skill1_id 技能1
 * @property int $skill1_level 技能1的等级
 * @property int $skill2_id 技能2
 * @property int $skill2_level 技能2的等级
 * @property int $defense 防御力
 * @property int $fire_res 火耐性
 * @property int $water_res 水耐性
 * @property int $thunder_res 累耐性
 * @property int $ice_res 冰耐性
 * @property int $position 部位（1-5代表头，胸，手，腰，腿）
 * @property int $inlay1 镶嵌槽1
 * @property int $inlay2 镶嵌槽2
 * @property int $inlay3 镶嵌槽3
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['group_id', 'skill1_id', 'skill1_level', 'skill2_id', 'skill2_level', 'defense', 'fire_res', 'water_res', 'thunder_res', 'ice_res', 'position', 'inlay1', 'inlay2', 'inlay3'], 'integer'],
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
            'group_id' => 'Group ID',
            'skill1_id' => 'Skill1 ID',
            'skill1_level' => 'Skill1 Level',
            'skill2_id' => 'Skill2 ID',
            'skill2_level' => 'Skill2 Level',
            'defense' => 'Defense',
            'fire_res' => 'Fire Res',
            'water_res' => 'Water Res',
            'thunder_res' => 'Thunder Res',
            'ice_res' => 'Ice Res',
            'position' => 'Position',
            'inlay1' => 'Inlay1',
            'inlay2' => 'Inlay2',
            'inlay3' => 'Inlay3',
        ];
    }
}
