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
</head>
<body>
    <form action="<?php echo BASE_PATH . 'loggin/loggin'; ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="submit">
    </form>
</body>
</html>