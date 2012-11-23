<?php
namespace bs {
  $LIB_DIR = dirname(__DIR__)."/lib";
  
  autoload('http\application\Base', "$LIB_DIR/http/application/base.php");
  import('http-router', 'http-action');
  
  require "$LIB_DIR/http/application/functions.php";
  require "$LIB_DIR/http/application/routes.php";
  
  class_alias('http\application\Base', 'http\Application');
}
?>