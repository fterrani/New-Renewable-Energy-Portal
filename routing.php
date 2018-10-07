<?php
spl_autoload_register( function($name){

    $level = error_reporting();
    error_reporting(0);

    include_once 'includes/'.$name.'php';
    // Trying to load from /models folder
    include_once 'models/'.$name.'.php';
    // Trying to load from /models folder
    include_once 'controllers/'.$name.'.php';

    error_reporting( $level );
});


echo "A";

$c_name = ucfirst( strtolower( $_GET['__c'] ) ) . 'Controller';
$action = $_GET['__a'];
$uri = $_GET['__uri'];
$spath = preg_split('/\\//', $uri );

// Cleaning $_GET variables (query string)
unset( $_GET['__c'] );
unset( $_GET['__a'] );
unset( $_GET['__uri'] );
echo "X $c_name";
error_reporting(E_ALL);
$controller = new $c_name();
error_reporting(E_ALL);
echo "B";
if ($controller->auto_status)
    http_response_code( $controller->status );
if ($controller->auto_mime)
    headers( 'Content-Type: ' . $controller->mimeType ); // TODO remove new lines!!

$controller->run( $action, $spath, $full_uri );





?>

<h1>ROUTING.PHP</h1>

<style>* {font-family: monospace}</style>

<h1>GET</h1>
<?php var_dump($_GET);?>

<h1>POST</h1>
<?php var_dump($_POST);?>

<h1>__FILE__</h1>
<?php echo __FILE__ ?>

<h1>__DIR__</h1>
<?php echo __DIR__ ?>


