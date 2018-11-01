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

        foreach( $scripts as $atts )
        {
            ?>
            <script type="text/javascript" <?=$atts?>></script>
            <?php
        }
        ?>
    </head>
    <body>