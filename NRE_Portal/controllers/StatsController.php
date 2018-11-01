<?php

class StatsController extends HtmlController
{
    function __construct()
    {
        parent::__construct();

        $this->title = 'Statistics of the New Renewable Energy in Valais';
        $this->addStylesheet('https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
        $this->addStylesheet('style');

        $this->addScript('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
        $this->addScript('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js');
    }

    function htmlBody()
    {
        View::render('stats', array('title' => $this->title));
    }
}