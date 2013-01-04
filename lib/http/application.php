<?php
/**
 * Initializes the http-application bundle
 *
 * PHP Version 5.3+
 * @author Thomas Monzel <tm@apparat-hamburg.de>
 * @version $Revision$
 * @package Battlesuit
 * @subpackage http-application
 */
namespace loader {
  if(defined('loader\available')) {
    
   /**
    * All the autoloading is done here
    * This function is getting called by the loader\Bundles::autoload
    * 
    */
    def('http\application\Base', __DIR__."/application/base.php");
    def('http\application\middleware\ShowExceptions', __DIR__."/application/middleware/show_exceptions.php");
    
    load('http-router', 'http-action');
  }
  
  require __DIR__."/application/functions.php";
  require __DIR__."/application/routes.php";
  
  class_alias('http\application\Base', 'http\Application');
}
?>