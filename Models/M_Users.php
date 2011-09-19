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

         $result = $this->msql->Select();

         return $result[0];
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

         $sid = $_SESSION['sid'];

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
                     $sid = null;
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
 }
