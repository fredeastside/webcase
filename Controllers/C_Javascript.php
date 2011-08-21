<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 17:54
 * To change this template use File | Settings | File Templates.
 */
require_once('/Models/M_SQL.php');

  class C_Javascript extends C_Page
{

    protected function OnInput()
    {
        parent::OnInput();

        $this->title .= 'Javascript';
        $this->content = '';
    }

    protected function OnOutput()
    {
        parent::OnOutput();
    }
}
