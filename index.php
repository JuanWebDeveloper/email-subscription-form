<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription of user emails</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h1>¡Subscribe!</h1>
        <p>By subscribing you will receive our information in your email</p>    
        <img src="subscribe.png" width="400px" height="200px" style="position: relative; left: 80px;">

        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" name="subscribe" value="¡Subscribe!">
    </form>

    <?php 
        require './record-data.php';

        if (isset($_POST['subscribe'])) {
    ?>
        <?php if(empty($message)): ?>
        <div class="ok"><h1 class="message">You have successfully subscribed</h1></div>
        <?php else: ?>
        <div class="bad"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php } ?>
</body>
</html>