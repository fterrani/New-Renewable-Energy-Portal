<?php

abstract class Controller
{
    protected $auto_status = true;
    protected $auto_mime = true;
    protected $auto_headers = true;

    protected $status = 200; // HTTP return status
    protected $mimeType = 'text/html'; // Returned data MIME type
    protected $headers = array(); // Custom HTTP headers

    static function header_escape( $str )
    {
        return str_replace( array('\r','\n'), '', $str );
    }

    function __construct()
    {}

    function addHeader($name, $value)
    {
        $this->headers[ self::header_escape($name) ] = self::header_escape($value);
    }

    function prerun( $action, $spath, $full_uri )
    {}

    function run( $action, $spath, $full_uri )
    {
        $this->prerun( $action, $spath, $full_uri );

        if ($this->auto_status)
            http_response_code( $this->status );

        if ($this->auto_mime)
        {
            header(
                'Content-Type: '.self::header_escape( $this->mimeType )
            );
        }

        if ($this->auto_headers)
        {
            foreach( $this->headers as $name => $value )
            {
                header( self::header_escape($name).': '.self::header_escape($value) );
            }
        }


        // Renders the HTTP content
        $this->response($action, $spath, $full_uri);

    }

    abstract function response($action, $spath, $full_uri );
}
