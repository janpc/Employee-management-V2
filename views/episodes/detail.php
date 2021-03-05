<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->data->name ?></title>

    <?php require_once(UTIL . 'htmlLinks.php') ?>

    <link rel="stylesheet" href="/employee-management-v2/assets/css/details.css">
    <link rel="stylesheet" href="/employee-management-v2/assets/css/episodeDetails.css">
    <script defer src="/employee-management-v2/assets/js/episodeDetails.js"></script>
</head>

<body>
    <?php require_once(ASSETS . 'html/header.html') ?>
    <section class='infoSection'>
        <img src="http://www.clker.com/cliparts/Q/v/Z/T/b/k/scotch-tape.svg" alt="" class="scotch-tape">
        <form action="" method="post" class='infoContainer' id='infoContainer' data-id=<?php echo $this->data->id ?>>
            <div class='info_column'>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value='<?php echo $this->data->name ?>'>
                <label for="air_date">Air Date:</label>
                <input type="date" name="air_date" id="air_date" value='<?php echo $this->data->airDate ?>'>
                <label for="season_no">Season:</label>
                <input type="number" name="season_no" id="season_no" value='<?php echo $this->data->seasonNo ?>'>
                <label for="episode_no">Episode:</label>
                <input type="number" name="episode_no" id="episode_no" value='<?php echo $this->data->episodeNo ?>'>
                <input type="submit" value="Save">
            </div>
        </form>
    </section>

</body>

</html>