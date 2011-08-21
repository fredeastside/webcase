<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 11.08.11
 * Time: 22:47
 * To change this template use File | Settings | File Templates.
 */
require_once '/Models/M_News.php';

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

            $this->id_new = $_GET['id'];
            $this->new = $mNew->ViewNew($this->id_new);
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
        $vars = array('new' => $this->new);
        $this->content = $this->View('/Views/ViewNew.php', $vars);

        parent::OnOutput();
    }
}
