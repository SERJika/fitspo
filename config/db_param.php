<?php 

return array(
	'db_host' 		=> 'localhost',
	'db_name' 		=> 'fitspo',
	'db_charset' 	=> 'utf8',
	'db_user' 		=> 'root',
	'db_pass' 		=> '',
	'db_opt' 		=> array(
	    PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
	    PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
	),
);