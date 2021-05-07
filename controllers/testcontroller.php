 <?php
require_once 'controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/carrier_model.php';
/**
 * 
 */
class testAction extends controller
{

	public function test()
	{
		$qwerty = ['test' => 'qwerty', 'test2' => 12345];
		testAction::getView('testView', $qwerty);
	}
}

testAction::do();