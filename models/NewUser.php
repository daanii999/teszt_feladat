<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 */
class NewUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['password', 'authKey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }
	
	public function getAuthKey() {
		return $this->authKey;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}
	
	public static function findIdentity($id) {
		return self::findOne($id);
	}
	
	public static function findIdentityByAccessToken($token, $type = null) {
		throw new \yii\base\NotSupportedException();
	}
	
	public static function findByUsername($username) {
		return self::findOne(['username'=>$username]);
	}
	
	public function validatePassword($password) {
		return $this->password === md5($password);
	}
}
