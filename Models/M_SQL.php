<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 21:10
 *@class M_SQL - менеджер базы данных. Служит для установки соединения с бд и проведения операций с данными.
 */
 class M_SQL
 {
     private static $instance; // экземпляр класса
     private $db; // коннекция к бд

     function __construct()
     {
        // Settings of database
         $host = 'localhost';
         $user = 'root';
         $password = '';
         $dbName = 'fredrsf';

         try
         {
             // создание объекта PDO
             $this->db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
             $this->db->exec('SET NAMES UTF8');
         }
         catch(PDOException $e)
         {
             echo 'Ошибка подключения: ' . $e->getMessage();
             die();
         }
     }

     public static function Instance()
     {
         if(self::$instance == null)
             self::$instance = new M_SQL();

         return self::$instance;
     }

     // Вставка в таблицу
     // $table - название таблицы
     // $objects - массив пар, ключ - поле таблицы, значение - значение поля
     // результат - id последней измененной строки
     public function Insert($table, $objects)
     {
         $columns = array();
         $values = array();
         $vars = array();

         foreach($objects as $column => $value)
         {
             $values[] = '?';
             $columns[] = $column;
             $vars[] = $value;
         }

         $columns_s = implode(',', $columns);
         $values_s = implode(',', $values);

         $stmt = $this->db->prepare("INSERT INTO $table ($columns_s) VALUES ($values_s)");

         $stmt->execute($vars);

         return $this->db->lastInsertId();
     }

     // Обновление строки в бд
     // $table - имя таблицы
     // $obj - массив пар, ключ - поле таблицы, значение - значение поля
     // $where - условие WHERE в SQL запросе
     // результат - число измененных строк в бд
     public function Update($table, $obj, $where)
     {
         $sets = array();

         foreach($obj as $column => $value)
         {
             $sets[] = "$column = '$value'";
         }

         $set_s = implode(',', $sets);

         $stmt = $this->db->prepare("UPDATE $table SET $set_s WHERE $where");
		
         $stmt->execute();

         return $stmt->rowCount();
     }

     // Удаление строк из бд
     // $table - имя таблицы
     // $where - условие WHERE в SQL запросе
     // результат - число измененных строк в бд
     public function Delete($table, $where)
     {
         $stmt = $this->db->prepare("DELETE FROM $table WHERE $where");
         $stmt->execute();

         return $stmt->rowCount();
     }

     // Выборка из бд
     // $query - SQL запрос
     // результат - массив выбранных объектов
     public function Select($query)
     {
         $stmt = $this->db->prepare($query);

         $res = $stmt->execute();

         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

         //if(!$result)
             //die('Ошибка выполнения запроса ' . print_r($stmt->errorInfo()));

         return $result;
     }
 }
