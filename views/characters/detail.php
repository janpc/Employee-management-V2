<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->data->name ?></title>

    <?php require_once(UTIL . 'htmlLinks.php') ?>

    <link rel="stylesheet" href="/employee-management-v2/assets/css/characterDetails.css">
    <script defer src="/employee-management-v2/assets/js/characterDetails.js"></script>
</head>

<body>
    <?php require_once(ASSETS . 'html/header.html') ?>
    <section class='infoSection'>
        <img src="https://pngimg.com/uploads/pin/pin_PNG100.png" alt="" class="pin">
        <form action="" method="post" class='infoContainer'>
            <div class='info_column'>
                <img src="https://rickandmortyapi.com/api/character/avatar/<?php echo $this->data->id ?>.jpeg" alt="">
                <label for="origin_loc">Origin:</label>
                <div>
                    <select name="origin_loc" id="origin_loc" data-locationId='<?php echo $this->data->originLoc->id; ?>'></select>
                    <a type="text" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/location/details/' . $this->data->originLoc->id ?>">Go!</a>
                </div>
                <label for="last_loc">Last Seen:</label>
                <div>
                    <select name="last_loc" id="last_loc" data-locationId='<?php echo $this->data->lastLoc->id; ?>'></select>
                    <a type="text" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/location/details/' . $this->data->lastLoc->id ?>">Go!</a>
                </div>
            </div>
            <div class='info_column'>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value='<?php echo $this->data->name ?>'>
                <label for="status">Status:</label>
                <select name="status" id="status" data-status='<?php echo $this->data->status; ?>'></select>
                <label for="species">Specie:</label>
                <input type="text" name="species" id="species" value='<?php echo $this->data->species ?>'>
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" data-gender='<?php echo $this->data->gender; ?>'></select>
                <input type="submit" value="Save">
            </div>
        </form>
    </section>
    <div class='moreInfo'>
        <section class='episodesSection'>
            <img src="https://pngimg.com/uploads/pin/pin_PNG100.png" alt="" class="pin">
            <h2>Episodes:</h2>
            <ul class='episodesSection-list'>
                <?php
                foreach ($this->data->episodes as $episode) {
                    echo "<li><a href='http://" . $_SERVER['SERVER_NAME'] . "/employee-management-v2/episode/details/" . $episode->id . "'>S$episode->seasonNo E$episode->episodeNo: $episode->name</a></li>";
                }
                ?>
            </ul>
        </section>

        <section class='travelsSection'>
            <img src="https://pngimg.com/uploads/pin/pin_PNG100.png" alt="" class="pin">
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

</body>

</html>