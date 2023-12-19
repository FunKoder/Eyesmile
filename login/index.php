<?php include('verify.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>

    <h1><?php echo $welcomeMessage; ?></h1>

    <p>This is the home page content visible to both admin and staff.</p>

    <?php if ($user['user_type'] === 'Admin') : ?>
        <p>Additional content or actions for admin.</p>
    <?php elseif ($user['user_type'] === 'Staff') : ?>
        <p>Additional content or actions for staff.</p>
    <?php endif; ?>

    <p><a href="logout.php">Logout</a></p>

</body>
</html>