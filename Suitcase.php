<?php
namespace suitcase {
  autoload('http\application\Base', __DIR__."/lib/http/application/base.php");
  import('http-router', 'http-action');
  
  require __DIR__."/lib/http/application/functions.php";
  require __DIR__."/lib/http/application/routes.php";
  
  class_alias('http\application\Base', 'http\Application');
}
?>