<?php

class EnergiesController extends HtmlController
{
    private $action = '';

    function __construct()
    {
        parent::__construct();

        $this->title = 'Map of New Renewable Energies';
    }

    function prerun( $action, $spath, $full_uri )
    {
        $this->action = $action;

        if ( $this->action == '')
        {
            $this->addScript('energy-map');
            $this->addScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyDZeOSaG7OnbKIWCIg98vqXWLky4n2nqY8&callback=initMap', array('defer' => '', 'async' => ''));
        }
        else
        {
            $this->addScript('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js');
        }
    }

    function htmlBody()
    {
        if ( $this->action == '' )
        {
            View::render(
                'energy-map',
                array(
                    'title' => $this->title,
                    'action' => $this->action
                )
            );
        }

        else
        {
            View::render(
                'energy-detail',
                array(
                    'title' => 'Details about ' . $this->action
                )
            );
        }
    }
}