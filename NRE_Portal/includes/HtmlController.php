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


        $this->addStylesheet('https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
        $this->addStylesheet('style');

        $this->addScript('https://code.jquery.com/jquery-3.3.1.min.js');
    }

    protected function addScript( $name, $attributes = array() )
    {
        $name = strval( $name );

        if ( preg_match($this->cdnPattern, $name) != 1 )
            $name = __PUBLIC_JS__.'/'.$name.'.js';

        $atts = array('src="'.htmlspecialchars($name).'"');

        foreach ($attributes as $k => $v)
        {
            $a = htmlspecialchars($k);

            if ($v != '')
                $a .= '="'.htmlspecialchars($v).'"';

            $atts[] = $a;
        }

        $this->scripts[] = implode(' ', $atts);
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
