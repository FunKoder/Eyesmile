<?php

$token = $_GET["token"];

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
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .box{
  margin-top: 5%;
}
</style>
<body style="background-color: #D7F1F6;">

    <div class="container-lg rounded shadow w-50 p-4 box bg-white">
        <form method="post" action="process-reset-password.php" class="w-100">
            <h3 class="text-center fw-semibold">Reset Password</h3><br>
            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <label for="password" class="form-label">New password</label><br>
            <input type="password" id="password" name="password" class="form-control"><br>

            <label for="password_confirmation" class="form-label">Repeat password</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"><br>

            <button class="btn btn-primary">Send</button>
        </form>
    </div>

</body>

</html>