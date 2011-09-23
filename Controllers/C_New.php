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

        if($this->IsGet())
        {
            $mNew = M_News::Instance();

            $this->id_new = !empty($_GET['id']) ? $_GET['id'] : null;
			
			if(!$this->id_new)
			{
				header('Location: index.php');
				die();
			}
			
            $this->new = $mNew->ViewNew($this->id_new);
			
			if(count($this->new) == 0)
			{
				header('Location: index.php');
				die();
			}
			
			$this->new = $this->new[0];

			$this->title .= 'Новости | ' . $this->new['title_new'];
        }
        else
        {
            header('Location index.php');
            die();
        }
    }

    protected function OnOutput()
    {
        $mUsers = M_Users::Instance();

        $vars = array('new' => $this->new, 'edit' => $mUsers->Can('EDITING_NEWS'));
        $this->content = $this->View('/Views/ViewNew.php', $vars);

        parent::OnOutput();
    }
}
