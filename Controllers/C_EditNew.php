<?php
class C_EditNew extends C_Page {

	private $new;
	private $id_new;
	
	function __construct()
	{}
	
	protected function OnInput()
	{
		parent::OnInput();
		$mUsers = M_Users::Instance();
		
		if($this->IsGet() && $mUsers->Get('EDITING_NEWS'))
		{
			
		}
	}
	
	protected function OnOutput()
	{
		
		parent::OnOutput();
	}

}
?>