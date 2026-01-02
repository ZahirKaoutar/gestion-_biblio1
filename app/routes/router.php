<?php
class Router {
    private $routes = [];

    public function __construct() {
        $this->routes = [
            "/" => ["ControllerHome", "index"],
            "/login" =>["AuthController", "Login"],
            "/register" =>["AuthController", "Register"],
             "/AfficheBook" =>["AdminController", "AfficheLivre"],
             "/Deletebook"=>["AdminController", "Deletebook"],
              "/mod"=>["AdminController", "Modviews"],
              "/modBook"=>["AdminController", "ModBook"],
              "/addbook"=>["AdminController", "AddBook"],
              "/AfficherReader"=>["AdminController", "AfficherReader"],
              "/Emprunt"=>["AdminController", "Emprunt"]
        ];
    }

    public function handleRequest() {   
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$uri])) {
            [$controllerName, $method] = $this->routes[$uri];

            
           require_once __DIR__ . '/../Controller/' . $controllerName . '.php';


            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                die("Méthode '{$method}' n'existe pas dans {$controllerName}");
            }
        } else {
            http_response_code(404);
            echo "404 - Route non trouvée";
        }
    }
}

























