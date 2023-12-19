<?php
include('otpverify2.php');
?>

<html>

<head>
  <title>OTP Verify</title>

</head>
<style>
  .error {
    color: red;
    font-weight: 700;
  }
</style>

<?php
include('../dental/includes/style-links.php');
?>
<body style="background-color: #D7F1F6;">
  <div class="container-lg mx-auto mb-0 rounded shadow">
    <div class="row d-flex align-items-center bg-white">
      <div class="col-md-5 d-flex align-self-center bg-info justify-content-center">
        <img src="../dental/icons/groupedstaff.png" alt="dentist" class="img-fluid" id="im2">
      </div>
      <div class="col-md-7 p-5 bg-white rounded-end-2">
        <form action="otpverify.php" method="post">
          <h3 class="">Email Verification</h3>
          <p class="lead">
            We sent a code to your email for verification.
          </p>
          <div class="mb-3">
            <input type="text" name="otp" class="form-control form-control-lg shadow-sm" id="otp" placeholder="Enter your OTP code" required data-parsley-type="otp" data-parsley-trigg er="keyup">
          </div>
          <input type="submit" name="otp_verify" value="Submit" class="btn w-100 p-2 fs-5 fw-bolder" id="btn1">
          <p class="error"><?php if (!empty($msg)) {
                              echo $msg;
                            } ?></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>