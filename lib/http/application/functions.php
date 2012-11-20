<?php
namespace http\application {
  
  class Setup {
    static $config = array();
  }
  
  function set($name, $value) {
    Setup::$config[$name] = $value;
  }
  
  function run($env = 'development') {
    extract(Setup::$config);
    
    if(!isset($base_class)) {
      $base_class = 'http\application\Base';
    }
    
    if(!isset($base_dir)) {
      $base_dir = '.';
    }
    
    if(function_exists('http\application\routes\base')) {
      $scope = routes\base();
      $scope->finalize();
      $routes = $scope->routes();
    }

    $app = new $base_class(realpath($base_dir), $env);
    $app->routes($routes);
    return $app->run();
  }
}
?>