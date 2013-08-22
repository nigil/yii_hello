<?php

/**
 * Форма регистрации
 */
class RegisterForm extends CFormModel
{
	public $email;
	public $password;
	public $repeat_password;
	public $company;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('email', 'unique', 'className' => 'User'),
			array('email, password, repeat_password, company', 'required'),
			array('password', 'compare', 'compareAttribute' => 'repeat_password')
		);
	}

	public function register()
	{
		$account = new User;
		// получаем данные от пользователя
    	$this -> attributes = $_POST['RegisterForm'];

    	$account -> email = $this -> email;
    	$account -> password = md5($this -> password);
    	$account -> company = $this -> company;

    	if ($this -> validate())
		{
			$account -> save();
			return true;
		}
		return false;
	}
}
