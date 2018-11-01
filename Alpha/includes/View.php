<?php

class View
{
    static function render( $__viewName, $__vars = array() )
    {
        if ( !is_iterable($__vars) )
            $__vars = array();

        // Creating view variables ('__viewFile' is reserved!)
        foreach( $__vars as $__name => $__value )
        {
            // Creating a variable named $name and containing $value
            $$__name = $__value;
        }

        $__viewFile = __MVC_V__.'/'.$__viewName.'.php';

        include $__viewFile;
    }
}