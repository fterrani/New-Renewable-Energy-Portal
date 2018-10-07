<?php

class DefaultController extends HtmlController
{
    function __construct()
    {
        $this->status = 404;
    }

    function htmlBody()
    {
        ?>
        <h1>Sorry!</h1>
        <p>The page you are looking for was not found</p>
        <p><a href="<?=__BASE_URL__?>">Back to home</a></p>
        <?php
    }
}
