<?php
class M_Comments extends M_SQL{
	private static $instance;
	private $msql;
	
	public function __construct()
	{
		$this->msql = M_SQL::Instance();
	}
	
	public static function Instance()
	{
		if(self::$instance == null)
			self::$instance = new M_Comments();
			
		return self::$instance;
	}
	
	public function SelectAllComments( $id_article )
	{
		$str = "SELECT * FROM tbl_comments WHERE id_article = '%d' ORDER BY id_comment ASC";
		$query = sprintf( $str, $id_article );
		
		$result = $this->msql->Select( $query );
		
		return $result;
	}
	
	public function AddComment( $id_article, $login, $content_comment )
	{	
		$data = array();
		$data['id_article'] = $id_article;
		$data['login'] = $login;
		$data['date_comment'] = date('Y-m-d H:i:s', time());
		$data['content_comment'] = $content_comment;
		
		$result = $this->msql->Insert( 'tbl_comments', $data );
		
		return $result;
	}
	
	public function Validate(&$arr, $captcha)
	{
		$errors = array();
		$data = array();
		
		if(!isset($_SESSION['captcha']))
			$errors['captcha'] = 'Captcha code is not correct!';
			
		if($_SESSION['captcha'] !== $captcha)
			$errors['captcha'] = 'Captcha code is not correct!';

		unset($_SESSION['captcha']);
		
		// Using the filter with a custom callback function:
		
		if(!($data['body'] = filter_input(INPUT_POST,'content',FILTER_CALLBACK,array('options'=>'$this->ValidateText'))))
		{
			$errors['body'] = 'Comment text is empty!';
		}
		
		if(!empty($errors)){
			
			// If there are errors, copy the $errors array to $arr:
			
			$arr = $errors;
			return false;
		}
		
		foreach($data as $k=>$v){
			$arr[$k] = $v;
		}
		
		return true;
	}
	
	private function ValidateText( $str )
	{
		if(mb_strlen($str,'utf8')<1)
			return false;
		
		// Encode all html special characters (<, >, ", & .. etc) and convert
		// the new line characters to <br> tags:
		
		$str = nl2br(htmlspecialchars($str));
		
		// Remove the new line characters that are left
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		
		return $str;
	}
	
	/*public function ShowOrHideComment( $id_comment )
	{
		$data = array();
		$data['visible'] = 0;
		
		$str = "id_comment = '%d'";
		$where = sprintf( $str, $id_comment );
		
		$result = $this->msql->Update( 'tbl_comments', $data, $where );
	}*/
	
	public function DeleteComment( $id_comment )
	{
		$str = "id_comment = '%d'";
		
		$where = sprintf( $str, $id_comment );
		
		$result = $this->msql->Delete( 'tbl_comments', $where );
		
		return $result;
	}
}
?>