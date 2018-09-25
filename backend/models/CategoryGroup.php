<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_group".
 *
 * @property int $id
 * @property string $name 分类组名称
 * @property string $code 分类组code
 * @property int $depth 该组下分类允许的最大层级数
 */
class CategoryGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['depth'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['code'], 'string', 'max' => 64],
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
            'code' => 'Code',
            'depth' => 'Depth',
        ];
    }
}
