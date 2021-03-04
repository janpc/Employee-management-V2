<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->data->name ?></title>

    <?php require_once(UTIL . 'htmlLinks.php') ?>

    <link rel="stylesheet" href="/employeeManagement2/employee-management-v2/assets/css/characterDetails.css">

</head>

<body>
    <?php require_once(ASSETS . 'html/header.html') ?>
    <section>
        <form action="" method="post" class='infoContainer'>
            <div class='info_column'>
                <img src="https://rickandmortyapi.com/api/character/avatar/<?php echo $this->data->id ?>.jpeg" alt="">
                <label for="origin_loc">Origin:</label>
                <div>
                    <a type="text" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/location/details/' . $this->data->originLoc->id ?>">></a>
                    <select name="origin_loc" id="origin_loc">
                        <option value="earth">earth</option>
                    </select>
                </div>
                <label for="last_loc">Last Seen:</label>
                <div>
                    <a type="text" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/employee-management-v2/location/details/' . $this->data->lastLoc->id ?>">></a>
                    <select name="last_loc" id="last_loc">
                        <option value="earth">earth</option>
                    </select>
                </div>
            </div>
            <div class='info_column'>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value='<?php echo $this->data->name ?>'>
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" value='<?php echo $this->data->status ?>'>
                <label for="species">Specie:</label>
                <input type="text" name="species" id="species" value='<?php echo $this->data->species ?>'>
                <label for="gender">Gender:</label>
                <input type="text" name="gender" id="gender" value='<?php echo $this->data->gender ?>'>
                <input type="submit" value="Save">
            </div>


        </form>
    </section>
</body>

</html>