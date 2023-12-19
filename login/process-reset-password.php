<?php

$token = $_POST["token"];
$errors = [];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/config.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    $errors[] = "Token not found";
} else {
    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        $errors[] = "Token has expired";
    }
}

if (strlen($_POST["password"]) < 8) {
    $errors[] = "Password must be at least 8 characters";
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    $errors[] = "Password must contain at least one letter";
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    $errors[] = "Password must contain at least one number";
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $errors[] = "Passwords must match";
}

if (empty($errors)) {
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "UPDATE user
            SET password = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("ss", $password_hash, $user["id"]);

    $stmt->execute();

    $success_message = "Password updated. You can now login.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .box {
        margin-top: 5%;
    }
</style>

<body style="background-color: #D7F1F6;">
    <div class="container-lg rounded shadow w-50 p-4 box bg-white text-center">
        <?php if (!empty($errors)) : ?>
            <h2 class="text-danger">Warning!</h2>
            <ul style="list-style-type: none;" class="fs-3 text-center fw-semibold">
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error; ?></li>
                    
                <?php endforeach; ?>
                
            </ul>
            <a class="btn btn-primary btn-lg" href="reset-password.php?token=<?= $token ?>" role="button">Go back</a>
        <?php endif; ?>

        <?php if (isset($success_message)) : ?>
            <p><?= $success_message; ?></p>
            <a href="login.php" class="btn btn-lg btn-primary" role="button">Continue</a>
        <?php endif; ?>
    </div>
</body>

</html>