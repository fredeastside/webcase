<?php
class M_Menu extends M_SQL{

    private static $instance;
    private $msql;

    public function __construct(){
        $this->msql = M_SQL::Instance();
    }

    public static function Instance(){
        if(self::$instance == null)
            self::$instance = new M_Menu();

        return self::$instance;
    }

    public function getMenu(){
        $query = "SELECT * FROM tbl_menu";
        $result = $this->msql->Select($query);

        return $result;
    }

    public function addNewMenu($title, $macros = ""){
        $menu = array();

        if(!$title)
            return false;

        if(!$macros)
            $macros = $this->getMacros($title);

        $menu['title_menu'] = $title;
        $menu['macros'] = $macros;

        $result = $this->msql->Insert('tbl_menu', $menu);

        if(!$result)
            return false;

        return true;
    }

    private function getMacros($title){
        $chars = array(
							'а' => 'a', 'б' => 'b', 'в' => 'v',  'г' => 'g',
							'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z',
							'и' => 'i', 'й' => 'y', 'к' => 'k',  'л' => 'l',
							'м' => 'm', 'н' => 'n', 'о' => 'o',  'п' => 'p',  'р' => 'r',
							'с' => 's', 'т' => 't', 'у' => 'u',  'ф' => 'f',
							'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
							'ъ' => '',  'ы' => 'y', 'ь' => '',   'э' => 'e',  'ю' => 'yu', 'я' => 'ya',
							'А' => 'A', 'Б' => 'B',  'В' => 'V',   'Г' => 'G',
							'Д' => 'D', 'Е' => 'E',  'Ё' => 'YO',  'Ж' => 'ZH', 'З' => 'Z',
							'И' => 'I', 'Й' => 'Y',  'К' => 'K',   'Л' => 'L',
							'М' => 'M', 'Н' => 'N',  'О' => 'O',   'П' => 'P',  'Р' => 'R',
							'С' => 'S', 'Т' => 'T',  'У' => 'U',   'Ф' => 'F',
							'Х' => 'H', 'Ц' => 'C',  'Ч' => 'CH',  'Ш' => 'SH', 'Щ' => 'SHCH',
							'Ъ' => '',  'Ы' => 'Y',  'Ь' => '',    'Э' => 'E',  'Ю' => 'YU',
							'Я' => 'YA', ' ' => '_'
							);
		$macros = preg_replace ('/[^a-zA-ZА-Яа-я0-9\s]/u', '', $title);

        $macros = strtr($macros, $chars);

		return $macros;
    }

    public function deleteMenu($id_menu){
        $str = "id_menu = '%d'";
        $where = sprintf($str, $id_menu);

        $this->msql->Delete('tbl_menu', $where);
    }

    public function getMenuItems($id_menu){
        $str = "SELECT * FROM tbl_menu_items WHERE id_menu = '%d' ORDER BY position ASC";
        $query = sprintf($str, $id_menu);
        $result = $this->msql->Select($query);
        return $result;
    }

    public function addNewMenuItem($id_menu, $name, $link = null, $parent_id = 0){
        $menu = array();

        if(!$name)
            return false;

        if(!$parent_id)
            $parent_id = 0;

        $menu['parent_id'] = $parent_id;
        $menu['id_menu'] = $id_menu;
        $menu['name'] = $name;

        if(!$link)
            $link = $this->getMacros($name);

        $menu['link'] = $link;
        $menu['position'] = $this->getPosition($id_menu) + 1;

        $result = $this->msql->Insert('tbl_menu_items', $menu);

        if(!$result)
            return false;

        return true;
    }

    private function getPosition($id_menu){
        $str = "SELECT MAX(position) as pos_max FROM tbl_menu_items WHERE id_menu = '%d'";

        $query = sprintf($str, $id_menu);

        $result = $this->msql->Select($query);

        if(!$result)
            return false;

        return $result[0]['pos_max'];
    }

}
 
