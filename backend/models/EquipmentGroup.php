<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_group".
 *
 * @property int $id
 * @property string $name 套装名称
 * @property int $monster_id 所属怪物id
 * @property int $level 套装稀有度
 * @property int $equipment_group_skill_id 套装技能id
 */
class EquipmentGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['monster_id', 'level', 'equipment_group_skill_id'], 'integer'],
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
            'monster_id' => 'Monster ID',
            'level' => 'Level',
            'equipment_group_skill_id' => 'Equipment Group Skill ID',
        ];
    }
}
