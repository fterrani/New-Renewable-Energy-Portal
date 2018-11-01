<?php

class MathController extends HtmlController
{
    private $a = 0;
    private $b = 0;
    private $op = 'sum';
    private $result = 0;

    function __construct()
    {
        $this->title = 'Legendary Math App';
        $this->addScript('script');
        $this->addStylesheet('style');
    }

    function prerun( $action, $spath, $full_uri )
    {
        $this->a = $_GET['a'] ?? 0;
        $this->b = $_GET['b'] ?? 0;
        $this->op = 'sum';

        $ops = array('sum','sub','mul','pow','div');

        if ( in_array($action, $ops) )
        {
            $this->op = $action;
        }

        switch ( $action )
        {
            case 'sum':
                $this->result = $this->a + $this->b;
                break;
            case 'sub':
                $this->result = $this->a - $this->b;
                break;
            case 'mul':
                $this->result = $this->a * $this->b;
                break;
            case 'pow':
                $this->result = $this->a ** $this->b;
                break;
            case 'div':
                $this->result = $this->a / $this->b;
                break;
        }
    }

    function htmlBody()
    {
        View::render(
            'math',
            array(
                'a' => $this->a,
                'b' => $this->b,
                'op' => $this->op,
                'result' => $this->result
            )
        );
    }
}