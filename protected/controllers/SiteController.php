<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * Действие для индексной страницы
	 */
	public function actionIndex()
	{
		// если пользователь не авторизовался, переходим на страницу авторизации
		if (Yii::app()->user->isGuest)
		{
			$this -> redirect('/login/');
		}
		// иначе переходим на страницу с табличкой
		else
		{
			$this -> redirect('/main/');
		}
	}

	/**
	 * Действие для главной страницы
	 */
	public function actionMain()
	{
		$model = new User;

		// если пользователь не зарегестрирован, перевод на форму авторизации
		if (Yii::app()->user->isGuest)
		{
			$this -> redirect('/login/');
		}

		$this -> render('main', array('model' => $model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Регистрация пользователя
	 */
	public function actionRegister()
	{
		$model = new RegisterForm;

		if (isset($_POST['RegisterForm']))
		{
			if ($model -> register())
			{
				$this -> redirect('/login/');
			}
		}

		$this->render('register', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model -> attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model -> validate() && $model -> login())
			{
				$this -> redirect(Yii::app() -> user -> returnUrl);
			}
		}
		// display the login form
		$this -> render('login', array('model' => $model));
	}

    
	/**
	 * Разлогинить пользователя
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/login/');
	}


    
	/**
	 * Поиск компаний
	 */
	public function actionGetCompanies()
	{
		if (isset($_POST['term']))
		{
			$model = new User;
			$_response = array();
			$companies = $model -> searchCompanies($_POST['term'], $_POST['limit']);
			foreach ($companies as $company)
			{
				$_response['companies'][] = $company -> company;
			}

			echo json_encode($_response);
		}

		Yii::app()->end();
	}
}