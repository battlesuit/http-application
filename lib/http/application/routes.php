<?php
namespace http\application\routes {
  function base() {
    static $scope;
    if(isset($scope)) return $scope;
    
    $scope = new \http\router\Scope();
    return $scope;
  }
  
  function scope($locals, $block = null) {
    base()->scope($locals, $block);
  }
  
  function resource($name, $locals = array(), $block = null) {
    base()->resource($name, $locals, $block);
  }
  
  function resources() {
    call_user_func_array(array(base(), 'resources'), func_get_args());
  }
  
  function controller($name, $locals, $block = null) {
    base()->controller($name, $locals, $block);
  }
  
  function to($target) {
    base()->to($target);
  }
  
  function match($conditions, $options, $target = null) {
    base()->match($conditions, $options, $target);
  }
  
  function get($paths, $target, array $options = array()) {
    base()->get($paths, $target, $options);
  }
  
  function post($paths, $target, array $options = array()) {
    base()->post($paths, $target, $options);
  }
  
  function put($paths, $target, array $options = array()) {
    base()->put($paths, $target, $options);
  }
  
  function delete($paths, $target, array $options = array()) {
    base()->delete($paths, $target, $options);
  }
  
  function local($name, $value) {
    base()->local($name, $value);
  }
}
?>