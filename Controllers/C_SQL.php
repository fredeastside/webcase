<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FredRSF
 * Date: 07.08.11
 * Time: 17:55
 * To change this template use File | Settings | File Templates.
 */
  class C_SQL extends C_Page
{

    protected function OnInput()
    {
        parent::OnInput();

        $this->title .= 'SQL';
        $this->content = '';
    }

    protected function OnOutput()
    {
        parent::OnOutput();
    }
}
