<?php
namespace http\application\routes {
  function base() {
    static $scope;
    if(isset($scope)) return $scope;
    
    $scope = new \http\route\Scope();
    return $scope;
  }
  
  function to($target) {
    base()->to($target);
  }
  
  function local($name, $value) {
    base()->local($name, $value);
  }
}
?>