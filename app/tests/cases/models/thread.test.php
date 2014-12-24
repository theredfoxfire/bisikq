<?php
/* Thread Test cases generated on: 2014-12-09 11:53:17 : 1418100797*/
App::import('Model', 'Thread');

class ThreadTestCase extends CakeTestCase {
	var $fixtures = array('app.thread', 'app.replythread', 'app.threadrate', 'app.category', 'app.categories_thread');

	function startTest() {
		$this->Thread =& ClassRegistry::init('Thread');
	}

	function endTest() {
		unset($this->Thread);
		ClassRegistry::flush();
	}

}
