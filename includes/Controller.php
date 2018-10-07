<?php

abstract class Controller
{
    protected $auto_mime = true;
    protected $auto_status = true;

    protected $status = 200;
    protected $mimeType = 'text/html';
    protected $headers = array();

    public abstract function run( $action, $spath, $full_uri );
}
