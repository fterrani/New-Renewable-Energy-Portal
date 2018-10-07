<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>

        <?php

        foreach( $stylesheets as $sheet )
        {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= __PUBLIC_CSS__.'/'.$sheet; ?>.css">
            <?php
        }

        foreach( $scripts as $scriptName )
        {
            ?>
            <script type="text/javascript" src="<?= __PUBLIC_JS__.'/'.$scriptName; ?>.js"></script>
            <?php
        }
        ?>
    </head>
    <body>