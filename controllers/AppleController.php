<?php

class AppleController extends Controller
{
    function __construct()
    {
        echo "xxxx";
    }
    public function run( $action, $spath, $full_uri )
    {
        echo "Hello! You are on the apple page.";
        echo " Your action is '$action'.";
        echo " Your URI is '$full_uri'.";
    }
}