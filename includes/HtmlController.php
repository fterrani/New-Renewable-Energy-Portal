<?php

abstract class HtmlController extends Controller
{
    protected $title = '';
    protected $scripts = array();
    protected $stylesheets = array();

    function __construct()
    {
        $this->status = 200;
        $this->mimeType = 'text/html';
    }

    protected function addScript( $name )
    {
        $this->scripts[] = strval( $name );
    }

    protected function addStylesheet( $name )
    {
        $this->stylesheets[] = strval( $name );
    }

    function response($action, $spath, $full_uri )
    {
        View::render(
            'html-header',
            array(
                'title' => $this->title,
                'scripts' => $this->scripts,
                'stylesheets' => $this->stylesheets
            )
        );

        $this->htmlBody();

        View::render('html-footer');
    }

    abstract function htmlBody();
}
