<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 18.09.11
 * Time: 23:07
 * To change this template use File | Settings | File Templates.
 * Менеджер пользователей
 */
 class M_Users{
     
     private static $instance;
     private $msql;
     private $session_id; // идентификатор текущей сессии
     private $user_id; // идентификатор текущего пользователя
     private $onlineMap; // карта пользователей находящихся online

     public function __construct()
     {
         $this->msql = M_SQL::Instance();
         $this->session_id = null;
         $this->user_id = null;
         $this->onlineMap = null;
     }

     public static function Instance()
     {
         if(self::$instance == null)
             self::$instance = new M_Users();

         return self::$instance;
     }

     /**
      * @public функция очистки устаревших сессий
      *
      * @return bool
      */
     public function ClearSessions()
     {
         $min_time = date('Y-m-d H:i:s', time() - 60 * 20);
         $str = "time_last < '%s'";
         $where = sprintf($str, $min_time);

         if($this->msql->Delete('tbl_sessions', $where))
             return true;
     }

     /**
      * @public функция очистки логинов которые не подтвердили регистрацию
      *
      * @return bool
      */
     public function ClearUsers()
     {
         $min_time = date('Y-m-d H:i:s', time() - 3600 * 72);
         $str = "date_registration < '%s'";
         $where = sprintf($str, $min_time);

         if($this->msql->Delete('v_not_active', $where))
             return true;
     }

     /**
      * @public функция авторизации пользователя
      *
      * @param string $login - логин пользователя
      * @param string $password - пароль пользователя
      * @param bool $remember - запомнить пользователя в куках или нет, default true
      *
      * @return bool
      */
     public function Login($login, $password, $remember = true)
     {
         if(empty($login))
             return false;
         
         $user = $this->GetByLogin($login);

         if($user == null)
             return false;

         $id_user = $user['id_user'];

         if($user['password'] != md5($password))
             return false;

         if($remember)
         {
             $expire = time() + 3600 * 24 * 100;
             setcookie('login', $login, $expire);
             setcookie('password', md5($password), $expire);
         }

         $this->session_id = $this->OpenSession($id_user);

         return true;
     }

     /**
      * @public функция получает пользователя из бд
      *
      * @param string $login - логин пользователя
      *
      * @return array
      */
     public function GetByLogin($login)
     {
         $str = "SELECT * FROM tbl_users WHERE login = '%s'";
         $query = sprintf($str, $login);

         $result = $this->msql->Select($query);

         if(count($result) != 0)
            return $result[0];
         else
             return null;
     }

     /**
      * @private функция открытия новой сессии
      *
      * @param int $id_user - идентификатор пользователя
      *
      * @return string - идентификатор сессии
      */
     private function OpenSession($id_user)
     {
         $sid = $this->GenerateStr(15);

         $now = date('Y-m-d H:i:s', time());

         $session = array();

         $session['id_user'] = $id_user;
         $session['sid'] = $sid;
         $session['time_start'] = $now;
         $session['time_last'] = $now;

         $this->msql->Insert('tbl_sessions', $session);

         $_SESSION['sid'] = $sid;

         return $sid;
     }

     /**
      * @private функция генерации рандомной строки
      *
      * @param int $lengt - длина рандомной строки, default = 15
      *
      * @return string
      */
     private function GenerateStr($length = 15)
     {
         $chars = 'abcdefghijklmnoprqstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789';
         $code = '';
         $clen = strlen($chars) - 1;

         while(strlen($code) < $length)
             $code .= $chars[mt_rand(0, $clen)];

         return $code;
     }

     /**
      * @private функция получения текущего идентификатора сессии
      *
      * @return string
      */
     private function GetSid()
     {
         if($this->session_id != null)
             return $this->session_id;

         $sid = isset($_SESSION['sid']) ? $_SESSION['sid'] : null;

         if($sid != null)
         {
             $session = array();
             $session['time_last'] = date('Y-m-d H:i:s');

             $str = "sid = '%s'";
             $where = sprintf($str, $sid);
             $rowCount = $this->msql->Update('tbl_sessions', $session, $where);

             if($rowCount == 0)
             {
                 $str = "SELECT count(*) FROM tbl_sessions WHERE sid = '%s'";
                 $query = sprintf($str, $sid);
                 $result = $this->msql->Select($query);

                 if($result[0]['count(*)'] == 0)
                 {
                     sleep(10);
                     $sid = null;
                 }
             }
         }

         if($sid == null && isset($_COOKIE['login']))
         {
             $user = $this->GetByLogin($_COOKIE['login']);

             if($user != null && $user['password'] == $_COOKIE['password'])
                 $sid = $this->OpenSession($user['id_user']);
         }

         if($sid != null)
             $this->session_id = $sid;

         return $sid;
     }

     /**
      * @public функция получения идентификатора текущего пользователя
      *
      * @return string
      */
     public function GetUid()
	 {
		 // Проверка кеша.
	 	 if ($this->user_id != null)
		    return $this->user_id;

		 $sid = $this->GetSid();

		 if ($sid == null)
		    return null;

		 $str = "SELECT id_user FROM tbl_sessions WHERE sid = '%s'";
		 $query = sprintf($str, $sid);
		 $result = $this->msql->Select($query);

		 if (count($result) == 0)
		    return null;

		 $this->user_id = $result[0]['id_user'];

		 return $this->user_id;
	 }

     /**
      * @public функция проверки активности пользователя
      *
      * @param int $id_user - идентификатор пользователя
      *
      * @return bool
      */
     public function IsOnline($id_user)
	 {
	    if ($this->onlineMap == null)
	    {
			$str = "SELECT DISTINCT id_user FROM tbl_sessions";
			$query  = sprintf($str, $id_user);
			$result = $this->msql->Select($query);

			foreach ($result as $item)
				$this->onlineMap[$item['id_user']] = true;
		}

		return ($this->onlineMap[$id_user] != null);
	 }
	 
	 /**
	    *@public фукнция выхода пользователя
	    *
	    *@return bool
	    */
	 public function Logout()
	 {
		setcookie('login', '', time() - 1);
		setcookie('password', '', time() - 1);
		$this->session_id = null;
		$this->user_id = null;
		unset($_SESSION['sid']);
		unset($_COOKIE['login']);
		unset($_COOKIE['password']);
		
		return true;
	 }
	 
	 /**
	    *@public функция получения пользователя
	    *
	    *@param int $id_user  - идентификатор пользователя, default = null
	    *
	    *@return array
	    */
	 public function Get($id_user = null)
	 {
		if($id_user == null)
			$id_user = $this->GetUid();
			
		if($id_user == null)
			return null;
			
		$str = "SELECT * FROM tbl_users WHERE id_user = '%d'";
		$query = sprintf($str, $id_user);
		$result = $this->msql->Select($query);
		
		return $result[0];
	 }
	 
	 /**
	    *@public функция проверки привелегии пользователя
	    *
	    *@param string $priv - название привелегии
	    *@param int $id_user - идентификатор пользователя, если не указан, значит для текущего, default = null
	    *
	    *@return bool
	    */
	 public function Can($priv, $id_user = null)
	 {
		if($id_user == null)
			$id_user = $this->GetUid();
			
		if($id_user == null)
			return false;
			
		$str = "SELECT count(*) as cnt FROM tbl_privs2roles p2r
			    LEFT JOIN tbl_users u ON u.id_role = p2r.id_role
			    LEFT JOIN tbl_privs p ON p.id_priv = p2r.id_priv 
			    WHERE u.id_user = '%d' AND p.name = '%s'";
				
		$query = sprintf($str, $id_user, $priv);
		$result = $this->msql->Select($query);
		
		return ($result[0]['cnt'] > 0);
	 }
	 
	 /**
	  *@public функция регистрации нового пользователя
	  *
	  *@param string $login
	  *@param string $email
	  *@param string $password
	  *
	  *@return int
	  */
	 public function Registration($login, $email, $password, $captcha)
	 {	
		if(!isset($_SESSION['captcha']))
			return 'Неправильный код подтверждения!';
			
		if($_SESSION['captcha'] !== $captcha)
			return 'Неправильный код подтверждения!';

		unset($_SESSION['captcha']);

		if(!$login)
			return 'Введите ваш логин!';

        if(!preg_match("/^[a-zA-Z0-9_]{4,}$/", $login))
            return 'Логин не должен быть менее 4 символов и может содержать только цифры и буквы!';

		if(!$email)
			return 'Введите ваш e-mail!';
			
		if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($email)))
			return 'Указанный вами e-mail некорректный!';
			
		if(!$password)
			return 'Введите ваш пароль!';
			
		if(!preg_match("/.{6,}$/", $password))
			return 'Пароль не должен быть менее 6 символов!';
		
		if($this->GetByLogin($login))
			return 'Пользователь с таким логином уже существует!';
			
		$code = $this->GenerateStr(20);
		
		$user = array();
		
		$user['login'] = $login;
		$user['password'] = md5($password);
		$user['id_role'] = 2;
		$user['email'] = $email;
		$user['is_active'] = 0;
		$user['date_registration'] = date('Y-m-d H:i:s', time());
		$user['code'] = $code;
		
		$result = $this->msql->Insert('tbl_users', $user);
		
		if(!$result)
			return 'Ошибка регистрации! Просьба обратиться к администратору сайта.';
		
		$this->RegistrationMail($email, $login, $code);
		
		return false;
	 }
	 
	 /**
	  *@public функция отправки сообщения о регистрации на сайте
	  *
	  *@param string $email
             * @param string $login
             * @param string $code
	  *
	  *@return bool
	  */	 
	  private function RegistrationMail($email, $login, $code)
	  {
			$mail = new C_Phpmailer();
			$mail->SetFrom('support@sunny-web.ru', 'SUPPORT');
			$mail->AddAddress($email);
			$mail->Subject = "Подтверждение регистрации на сайте sunny-web.ru";
			$mail->Body = "<p>Hello, $login!</p>
<p>На Ваш e-mail была запрошена регистрация на сайте Sunny-Web.ru!</p>
<p>Для подтверждения своих намерений перейдите по этой ссылке:
<a href='http://sunny-web/confirm/" . md5($code) . "'>http://sunny-web/confirm/" . md5($code) . "</a></p>
<p>Внимание! Ссылка будет доступна в течение 3-х суток. Если Вы не подтвердите регистрацию за это время, то пользователь будет удален и процесс регистрации придется начинать заново!</p>
<p>С уважением, Ваш <a href='http://sunny-web/'>Sunny-web</a>.</p>";
			$mail->isHTML(true);
			$mail->Send();
	  }
	  
	 /**
	    *@public функция поиска незарегистрированного пользователя.
	    *
	    *@param string $code - md5 код подтверждения
	    *
	    *@return bool
	    */
	 public function SearchUsers($code)
	 {
		$str = "SELECT login FROM v_not_active WHERE MD5(code) = '%s'";
		
		$query = sprintf($str, $code);
		
		return $this->msql->Select($query);
	 }
	 
	 /**
	    *@public функция изменения статуса пользователя на зарегистрированого
	    *
	    *@param string $code - md5 код подтверждения
	    *
	    *@return bool
	    */
	 public function UpdateNotActiveUser($code)
	 {
		$str = "MD5(code) = '%s'";
		
		$where = sprintf($str, $code);
		
		$data = array();
		
		$data['is_active'] = 1;
		$data['code'] = $this->GenerateStr(20);
		
		return $this->msql->Update('v_not_active', $data, $where);
	 }
 }
