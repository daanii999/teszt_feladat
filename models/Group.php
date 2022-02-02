<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $is_deleted
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'is_deleted'], 'required'],
            [['parent_id', 'is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 30],
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
            'parent_id' => 'Parent ID',
            'is_deleted' => 'Is Deleted',
        ];
    }
	
	/**
	 * This is the hierarchy for model "Group"
	 *
	 * @param boolean $justParents Return just parents(true) or all(false) | Default: false
	 *
	 * @return Array
	 */
	public static function getHierarchy($justParents = false)
	{
		if(!$justParents) return Group::find()->where(['is_deleted' => 0])->all();
		else return Group::find()->where(['parent_id' => 0])->andWhere(['is_deleted' => 0])->all();
	}
}
