<?php

abstract class Controller
{
    protected $auto_status = true;
    protected $auto_mime = true;
    protected $auto_headers = true;

    protected $status = 200; // HTTP return status
    protected $mimeType = 'text/html'; // Returned data MIME type
    protected $headers = array(); // Custom HTTP headers

    function prerun( $action, $spath, $full_uri )
    {}

    function run( $action, $spath, $full_uri )
    {
        $this->prerun( $action, $spath, $full_uri );

        function header_escape( $str )
        {
            return str_replace( array('\r','\n'), '', $str );
        }

        if ($this->auto_status)
            http_response_code( $this->status );

        if ($this->auto_mime)
        {
            header(
                'Content-Type: '.header_escape( $this->mimeType )
            );
        }

        if ($this->auto_headers)
        {
            foreach( $this->headers as $name => $value )
            {
                header( header_escape($name).': '.header_escape($value) );
            }
        }

        // Renders the HTTP content
        $this->response( $action, $spath, $full_uri );
    }

    abstract function response($action, $spath, $full_uri );
}
