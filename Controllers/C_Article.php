<?php
class C_Article extends C_Page{
	
	private $id_article;
	private $article;
	private $comments;
	private $error;
	
	protected function OnInput()
	{
		parent::OnInput();
		$mArticle = M_Articles::Instance();
		$mComments = M_Comments::Instance();
		
		$this->id_article = !empty($_GET['id']) ? $_GET['id'] : null;
		$this->comments = $mComments->SelectAllComments( $this->id_article );
		
		if($this->IsGet())
		{	
			if(!$this->id_article)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $mArticle->ViewArticle($this->id_article);
			
			if(count($this->article) == 0)
			{
				header('Location: /');
				die();
			}
			
			$this->article = $this->article[0];
			
			$this->title .= 'Статьи | ' . $this->article['title_article'];
		}
		
		if($this->IsPost())
		{
			//if( isset( $_POST['delete_article'] ) )
			//{
				//$result = $mArticle->DeleteArticle($this->id_article);
				$arr = array();
				
				$validates = $mComments->Validate($arr);
				
				if( $validates )
				{
					$mComments->AddComment( $this->id_article, $this->user['login'], $arr['body'] );
					
					echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));
				}
				else
				{
					/* Outputtng the error messages */
					echo '{"status":0,"errors":'.json_encode($arr).'}';
				}
				//print_r($result);
				
				/*if(!$result)
					header('Location: /');
				else
					header('Location: /articles.html');*/
			//}
			//elseif( isset( $_POST['delete_comment'] ) )
			//{
			//}
			//else
			//{
				//$captcha = !empty($_POST['captcha']) ? htmlspecialchars( trim( $_POST['captcha'] ) ) : null;
				//$content = !empty($_POST['content']) ? trim($_POST['content']) : null;
				
				//$result = $mComments->AddComment( $captcha, $this->id_article, $this->user['login'], $content );
				
				//if( is_string ($result) )
					//$this->error = $result;
				
				//if(!$result)
					//header('Location: /');
				//else
					//header('Location: /article/' . $this->id_article . '.html');
			//}
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();
		
		$vars = array( 'article' => $this->article, 'edit' => $mUsers->Can('EDITING_ARTICLES'), 'delete' => $mUsers->Can('DELETE_ARTICLES'), 'comments' => $this->comments, 'add_comment' => $mUsers->Can('ADD_COMMENT'), 'delete_comment' => $mUsers->Can('DELETE_COMMENT'), 'login' => $this->user['login'], 'errors' => $this->error );
		
		$this->content = $this->View('/Views/ViewArticle.php', $vars);
		
		parent::OnOutput();
	}
}
?>