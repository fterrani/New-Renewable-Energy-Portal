<?php

abstract class HtmlController extends Controller
{
    protected $title = '';
    protected $scripts = array();
    protected $stylesheets = array();

    private $cdnPattern = '/^https?:\\/\\//';

    function __construct()
    {
        parent::__construct();

        $this->status = 200;
        $this->mimeType = 'text/html';
    }

    protected function addScript( $name )
    {
        $name = strval( $name );

        if ( preg_match($this->cdnPattern, $name) != 1 )
            $name = __PUBLIC_JS__.'/'.$name.'.js';

        $this->scripts[] = $name;
    }

    protected function addStylesheet( $name )
    {
        $name = strval( $name );

        if ( preg_match($this->cdnPattern, $name) != 1 )
            $name = __PUBLIC_CSS__.'/'.$name.'.css';

        $this->stylesheets[] = $name;
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
