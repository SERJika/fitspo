<?php

spl_autoload_register(function ($class_name) {
 
	$array_paths = array(
		'/models/',
		'/components/',
		'/vendor/',
	);

	foreach ($array_paths as $path) {
		$path = BASE_DOMAIN . $path . $class_name . '.php';
		if (is_file($path)) {
			include_once($path);
		}
	}
});