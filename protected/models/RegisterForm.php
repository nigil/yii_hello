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
			array('email', 'email'),
			array('email', 'unique', 'className' => 'User'),
			array('email, password, repeat_password, company', 'required'),
			array('repeat_password', 'compare', 'compareAttribute' => 'password')
		);
	}

	public function register()
	{
		$account = new User;
		// получаем данные от пользователя
    	$this -> attributes = $_POST['RegisterForm'];

    	$account -> email = $this -> email;
    	$account -> password = crypt($this -> password);
    	$account -> company = $this -> company;

    	if ($this -> validate())
		{
			$account -> save();
			return true;
		}
		return false;
	}
}
