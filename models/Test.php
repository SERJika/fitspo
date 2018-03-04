<?php

class Test
{
	public static function showUserMsg($msg)
	{
		echo '====================' . PHP_EOL;
        echo '=== MSG FOR USER ===' . PHP_EOL;
        echo '====================' . PHP_EOL . PHP_EOL;
		if ($msg) {
			foreach ($msg as $val) {
			    echo $val . PHP_EOL;
		    }
		} else {
			echo ' NO VALUE' . PHP_EOL;
		}		
        echo PHP_EOL . '====================' . PHP_EOL;
	}
    
    
	public static function showLog($log)
	{
		echo PHP_EOL . $log . PHP_EOL;
	}
}