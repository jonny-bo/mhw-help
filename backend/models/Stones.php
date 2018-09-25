<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stones".
 *
 * @property int $id
 * @property string $name 护石名称
 * @property int $level 稀有度
 * @property int $skill1_id 技能1id
 * @property int $skill1_level 技能1等级
 * @property int $skill2_id 技能2id
 * @property int $skill2_level 技能2等级
 */
class Stones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level', 'skill1_id', 'skill1_level', 'skill2_id', 'skill2_level'], 'integer'],
            [['skill1_id', 'skill2_id'], 'required'],
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
            'level' => 'Level',
            'skill1_id' => 'Skill1 ID',
            'skill1_level' => 'Skill1 Level',
            'skill2_id' => 'Skill2 ID',
            'skill2_level' => 'Skill2 Level',
        ];
    }
}
