<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $company
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'accounts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, company', 'required'),
			array('email, password, company', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, password, company', 'safe', 'on'=>'search'),
		);
	}*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'company' => 'Company',
		);
	}

	/**
	 * Поиск компаний
	 */
	public function searchCompanies()
	{
		$criteria = new CDbCriteria;

		$criteria -> compare('company', $this -> company, true);
		$criteria -> select = array('company');

		return User::model() -> findAll($criteria);
	}

	/**
	 * Вернуть всех пользователей
	 */
	public function getUsers()
	{
		$criteria = new CDbCriteria;

		$criteria -> select = array('email', 'company');

		return User::model() -> findAll($criteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
