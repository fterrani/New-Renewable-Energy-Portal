<?php

abstract class AjaxController extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->status = 200;
        $this->mimeType = 'application/json';
    }

    function response($action, $spath, $full_uri)
    {
        echo json_encode( $this->getObject() );
    }

    abstract function getObject();
}
