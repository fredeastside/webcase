<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 17:39
 * To change this template use File | Settings | File Templates.
 */
class C_Articles extends C_Page
{


    protected function OnInput()
    {
        parent::OnInput();

        $this->title .= 'Статьи';
        $this->content = '';
    }

    protected function OnOutput()
    {
        parent::OnOutput();
    }
}
 
