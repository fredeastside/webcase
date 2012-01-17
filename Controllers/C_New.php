<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 22:47
 * To change this template use File | Settings | File Templates.
 */
class C_New extends C_Page
{
    private $id_new;
    private $new;

    protected function OnInput()
    {
        parent::OnInput();
		
		$mNew = M_News::Instance();

        if($this->IsGet())
        {
            $this->id_new = !empty($_GET['id']) ? $_GET['id'] : null;
			
			if(!$this->id_new)
			{
				header('Location: /');
				die();
			}
			
            $this->new = $mNew->ViewNew($this->id_new);
			
			if(count($this->new) == 0)
			{
				header('Location: /');
				die();
			}
			
			$this->new = $this->new[0];

			$this->title .= 'Новости | ' . $this->new['title_new'];
        }
		
		if($this->IsPost())
		{
			$this->id_new = !empty($_GET['id']) ? $_GET['id'] : null;
			
			$result = $mNew->DeleteNew($this->id_new);
			
			//print_r($result);
			
			if(!$result)
				header('Location: /');
			else
				header('Location: /news.html');
		}
    }

    protected function OnOutput()
    {
        $mUsers = M_Users::Instance();

        $vars = array('new' => $this->new, 'edit' => $mUsers->Can('EDITING_NEWS'), 'delete' => $mUsers->Can('DELETE_NEWS'));
        $this->content = $this->View('ViewNew', $vars);

        parent::OnOutput();
    }
}
