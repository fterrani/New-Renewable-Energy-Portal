<h1><?=$title?></h1>

<div class="nre-container">

    <div id="map" style="width: 800px; height: 500px"></div>

    <?php View::render('energy-switch-buttons'); ?>

    <!--
    <p>Is the user logged? <b><?=(isset($_SESSION['logged']) ? 'YES':'NO')?></b></p>
    -->

</div>
