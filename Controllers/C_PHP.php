<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 17:54
 * To change this template use File | Settings | File Templates.
 */
 class C_PHP extends C_Page
{

    protected function OnInput()
    {
        parent::OnInput();

        $this->title .= 'PHP';
        $this->content = '';
    }

    protected function OnOutput()
    {
        parent::OnOutput();
    }
}
