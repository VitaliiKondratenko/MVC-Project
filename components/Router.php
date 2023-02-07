<?php


class Router
{
    private $routes;

    public function __construct(){
        $routerPath = ROOT."/config/routes.php";
        $this->routes = include ($routerPath);
    }

    public function getUri(){
        if(isset($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){
        $uri = $this->getUri();

        foreach ($this->routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
//                echo$internalRoute;
                $uriComponents = explode("/", $internalRoute);
//                print_r($uriComponents);
                $controllerName = ucfirst(array_shift($uriComponents))."Controller";
                $actionName = "action".ucfirst(array_shift($uriComponents));
                echo$controllerName."<br>".$actionName;
                $parameter = [];
                $parameter = $uriComponents;

                $controllerFile = ROOT."/controllers/".$controllerName.".php";
                if(file_exists($controllerFile)){
                    include ($controllerFile);
                    $object = new $controllerName;
                    $result = call_user_func_array(array($object, $actionName), $parameter);
                    if($result){
                        break;
                    }
                }
            }
        }
    }
}