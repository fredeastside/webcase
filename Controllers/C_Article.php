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
		
		$this->id_article = !empty($_GET['id']) ? (int)$_GET['id'] : null;
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
			if( isset( $_POST['delete_article'] ) )
			{
				$result = $mArticle->DeleteArticle($this->id_article);
				
				//print_r($result);
				
				if(!$result)
					header('Location: /');
				else
					header('Location: /articles.html');
			}
			elseif( isset( $_POST['delete_comment'] ) )
			{
                //$result = $mArticle->DeleteComment( $id_comment );
			}
			else
			{
				$arr = array();
				$captcha = !empty( $_POST['captcha'] ) ? htmlspecialchars( trim( $_POST['captcha'] ) ) : null;
				
				$validates = $mComments->Validate($arr, $captcha);
				
				if( $validates )
				{
					$comment = $mComments->AddComment( $this->id_article, $this->user['login'], $arr['body'] );
					
					die( json_encode( array( 'status'=>1, 'html'=> $comment) ));
				}
				else
				{
					/* Outputtng the error messages */
					die( '{"status":0,"errors":' . $this->JsonEncodeCyr($arr).'}' );
				}
			}
		}
	}
	
	protected function OnOutput()
	{
		$mUsers = M_Users::Instance();

		$this->smarty->assign(array( 'article' => $this->article,
                                     'edit' => $mUsers->Can('EDITING_ARTICLES'),
                                     'delete' => $mUsers->Can('DELETE_ARTICLES'),
                                     'comments' => $this->comments,
                                     'add_comment' => $mUsers->Can('ADD_COMMENT'),
                                     'delete_comment' => $mUsers->Can('DELETE_COMMENT'),
                                     'login' => $this->user['login'],
                                     'errors' => $this->error ));

		$this->content = $this->smarty->fetch('ViewArticle.tpl');
		
		parent::OnOutput();
	}
}
?>
