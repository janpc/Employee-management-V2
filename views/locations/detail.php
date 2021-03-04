<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->data->name ?></title>

    <?php require_once(UTIL . 'htmlLinks.php') ?>

    <link rel="stylesheet" href="/employee-management-v2/assets/css/locationDetails.css">
    <script defer src="/employee-management-v2/assets/js/locationDetails.js"></script>
</head>

<body>
    <?php require_once(ASSETS . 'html/header.html') ?>
    <section class='residents__section'>
        <h2 style=color:white;position:fixed;top:70px>Residents:</h2>
        <ul class='resident__ul'>
        <?php
            foreach ($this->data->residents as $resident) {
                echo "
                <li class='resident__li'>
                    <h2>$resident->name</h2>
                    <a href='http://" . $_SERVER['SERVER_NAME'] . "/employee-management-v2/character/details/" . $resident->id . "'>
                        <img width=150 src='https://rickandmortyapi.com/api/character/avatar/$resident->id.jpeg' alt=''>
                    </a>
                </li>";
            }
        ?>
        </ul>
    </section>
    <section class='infoSection'>
        <form action="" method="post" class='infoContainer'>
            <div class='info_column'>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value='<?php echo $this->data->name ?>'>
                <label for="status">Location type:</label>
                <input type="text" name="locType" id="locType" value='<?php echo $this->data->locType ?>'>
                <label for="species">Dimension:</label>
                <input type="text" name="species" id="species" value='<?php echo $this->data->dimension ?>'>
            </div>
        </form>
    </section>
    <!--
    <div class='moreInfo'>
        <section class='episodesSection'>
            <h2>Residents:</h2>
            <ul class='episodesSection-list'>
                <?php
                foreach ($this->data->residents as $resident) {
                    echo "<li><a href='http://" . $_SERVER['SERVER_NAME'] . "/employee-management-v2/character/details/" . $resident->id . "'>S$resident->name </a></li>";
                }
                ?>
            </ul>
        </section>

        <section class='travelsSection'>
            <h2>Travels:</h2>
            <ul class='travelsSection-list'>
                <?php
                if (isset($this->data->travels)) {
                    foreach ($this->data->travels as $travel) {
                        echo "<li><a href='http://" . $_SERVER['SERVER_NAME'] . "/employee-management-v2/travel/details/" . $travel->id . "'></a></li>";
                    }
                }
                ?>
            </ul>
        </section>
    </div>
    -->

</body>

</html>