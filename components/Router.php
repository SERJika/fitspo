<?php 

/**
 *
 */
class Router
{
	public $routes;

	public function __construct()
	{
		$routesPath = BASE_DOMAIN.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	/**
	 * Returns request string
	 * @return string
	 */
	private function getUri()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		// Получаю строку запроса
		$uri = $this->getUri();
        
		// Проверяю наличие соответствия запроса стандартным путям
		foreach($this->routes as $uriPattern => $path) {
											
			if (preg_match("~$uriPattern~", $uri)) {
				
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				
				$segments = explode('/', $internalRoute);
				
				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);
				$actionName = 'action' . ucfirst(array_shift($segments));
				$parameters = $segments;

			// echo '<br>$controllerName = ' . $controllerName . ';<br>';
			// echo '$actionName = ' . $actionName . ';<br><br>';

                //if ( !isset($_SESSION['user']) && ($controllerName != 'EditController') ) {
                //	$controllerName = 'EditController';
                //	$actionName = 'actionIndex';
                //}

   //          echo '$controllerName = ' . $controllerName . ';<br>';
			// echo '$actionName = ' . $actionName . ';<br>';
			// if (isset($_SESSION['user'])) echo '$_SESSION[\'user\'] = ' . $_SESSION['user'] . ';<br>';

            	$controllerFile = BASE_DOMAIN . '/controllers/' . $controllerName . '.php';
                
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
                
				$controllerObject = new $controllerName;
                
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
				if ($result != null) {
					break;
				}					
			}
		}
	}
}