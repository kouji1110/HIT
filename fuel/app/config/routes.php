<?php
return array(
	'_root_'  => 'index',  // The default route
	'_404_'   => '404/index',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);