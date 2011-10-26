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
	
	public function AddComment( $id_article, $login, $date_comment, $content_comment )
	{
		$data = array();
		$data['id_article'] = $id_article;
		$data['login'] = $login;
		$data['date_comment'] = date('Y-m-d H:i:s', time());
		$data['content_comment'] = $content_comment;
		
		$result = $this->msql->Insert( 'tbl_comments', $data );
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
		
	}
}
?>