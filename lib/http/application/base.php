<?php
namespace http\application;
use http\Router;
use http\transaction;

class Base {
  public $env;
  protected $dir;
  protected $routes;
  protected $config = array();
  
  final function __construct($dir, $env = 'production') {
    $this->dir = $dir;
    $this->env = $env;
    if(method_exists($this, 'initialize')) $this->initialize();
  }
  
  function __invoke($request) {
    $request->env['application'] = $this;
    $router = new Router($this->routes);
    return $router->route_request($request);
  }
  
  function routes($routes) {
    $this->routes = $routes;
  }
  
  function dir() {
    return $this->dir;
  }
  
  function set($name, $value) {
    $this->config[$name] = $value;
  }
  
  function include_paths() {
    foreach(func_get_args() as $path) {
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->dir.DIRECTORY_SEPARATOR.trim($path, '/\\'));
    }
  }
  
  function run() {
    return transaction\Server::run($this, transaction\request(), array('http\application\middleware\ShowExceptions'))->serve();
  }
}
?>