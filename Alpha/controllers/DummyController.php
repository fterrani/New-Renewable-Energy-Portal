<?php

class DummyController extends Controller
{
    function __construct()
    {
        $this->status = 200;
        $this->mimeType = 'text/plain';
    }

    function response( $action, $spath, $full_uri )
    {
        echo "Hello! You are on the dummy page.";
        echo " Your action is '$action'.";
        echo " Your URI is '$full_uri'.";
    }
}
