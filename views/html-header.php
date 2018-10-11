<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>

        <?php

        foreach( $stylesheets as $sheet )
        {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= $sheet ?>">
            <?php
        }

        foreach( $scripts as $scriptName )
        {
            ?>
            <script type="text/javascript" src="<?= $scriptName ?>"></script>
            <?php
        }
        ?>
    </head>
    <body>