<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_group_skill".
 *
 * @property int $id
 * @property string $name 套装技能名称
 * @property int $skill1_id 技能1id
 * @property int $skill1_level 技能1等级
 * @property int $skill1_limit 技能1触发条件（几件系列防具）
 * @property int $skill2_id 技能2id
 * @property int $skill2_level 技能2等级
 * @property int $skill2_limit 技能2触发条件
 */
class EquipmentGroupSkill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_group_skill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['skill1_id', 'skill1_level', 'skill1_limit', 'skill2_id', 'skill2_level', 'skill2_limit'], 'integer'],
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
            'skill1_id' => 'Skill1 ID',
            'skill1_level' => 'Skill1 Level',
            'skill1_limit' => 'Skill1 Limit',
            'skill2_id' => 'Skill2 ID',
            'skill2_level' => 'Skill2 Level',
            'skill2_limit' => 'Skill2 Limit',
        ];
    }
}
