<?php

// loggin
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin</title>
    <link rel="stylesheet" href="/employee-management-v2/assets/css/loggin.css">
</head>
<body>
    <form class='loggin' action="<?php echo BASE_PATH . 'loggin/loggin'; ?>" method="post">
        <img src="http://www.clker.com/cliparts/Q/v/Z/T/b/k/scotch-tape.svg" alt="" class="scotch-tape">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="submit">
    </form>
</body>
</html>