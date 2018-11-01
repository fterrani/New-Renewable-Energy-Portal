<?php

define('__BASE__', str_replace('\\','/',__DIR__));
define('__INCLUDES__', __BASE__.'/includes');
define('__MVC_M__', __BASE__.'/models');
define('__MVC_V__', __BASE__.'/views');
define('__MVC_C__', __BASE__.'/controllers');

define('__BASE_URL__', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']));
define('__PUBLIC__', __BASE_URL__.'/public');
define('__PUBLIC_CSS__', __PUBLIC__.'/css');
define('__PUBLIC_JS__', __PUBLIC__.'/js');
define('__PUBLIC_IMG__', __PUBLIC__.'/img');

define('__DB_HOST__', 'localhost');
define('__DB_USER__', 'root');
define('__DB_PASSWORD__', '');
define('__DB_SCHEMA__', 'db_nre');


spl_autoload_register( function($className)
{
    $folders = array( __INCLUDES__, __MVC_M__, __MVC_C__ );

    $loaded = false;
    $level = error_reporting();
    error_reporting(0);

    foreach ( $folders as $folder )
    {
        $loaded = include_once ($folder.'/'.$className.'.php');

        if ($loaded)
            break;
    }

    error_reporting( $level );

    if (!$loaded)
    {
        throw new Exception('Autoload function did not find class \''.$className.'\'' );
    }
});

$uri = (isset($_GET['__uri']) ? $_GET['__uri'] : '');
$uri = ($uri == '' ? 'login' : $uri);

$uri_parts = explode('/', $uri);

$c_name = ucfirst( strtolower( $uri_parts[0] ) ) . 'Controller';
$action = ( isset($uri_parts[1]) ? $uri_parts[1] : '' );

// Cleaning $_GET variables (query string)
unset( $_GET['__uri'] );


try
{
    $controller = new $c_name();
}
catch(Exception $e)
{
    $controller = new DefaultController();
}

$controller->run( $action, $uri_parts, $uri );

/*
?>

<hr>
<div style="font-family: monospace">

    <h1>ROUTING INFOS</h1>
    <?php
    var_dump($_GET);
    var_dump( $_SERVER );
    ?>
</div>
*/




