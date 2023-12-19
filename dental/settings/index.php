<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php include('../includes/header.php');
 $setting = getById('settings', 1);
?>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg py-3 bg-white shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        EyeSmile
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment.php">Appointment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="py-5 bg-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm bg-dark-blue" style="border: none;">
                <img src="<?= $setting['data']['dental_image'] ?? 'path_to_default_image.jpg' ?>" class="w-100 rounded" alt="Img" style="min-height:300px;max-height:300px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="text-center text-light">Dental Clinic</h5>
                        <div class="mt-auto text-center">
                            <a href="dentalservices.html" class="btn btn-link py-2 mt-4">View Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm bg-dark-blue" style="border: none;">
                <img src="<?= $setting['data']['optical_image'] ?? 'path_to_default_image.jpg' ?>"  class="w-100 rounded" alt="Img" style="min-height:300px;max-height:300px;" >
                    <div class="card-body d-flex flex-column">
                        <h5 class="text-center text-light ">Optical Clinic</h5>
                        <div class="mt-auto text-center">
                            <a href="opticservices.html" class="btn btn-link py-2 mt-4">View Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

   <!-- Footer -->
   <footer class="footer bg-dark py-4" >
    <div class="container grid grid-3">
        <div>
            <h1 class="text-light">EYESMILE
            </h1>
            <p class="text-light">Copyright &copy; 2023</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" style="text-decoration: none;">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="appointment.php">Appointment</a></li>
            </ul>
        </nav>
        <div class="social" style="width: max-content;">
            <a href="#"><i class="fa-solid fa-location-dot fa-2x "></i></a><br>
            <a href="#"><i class="fas fa-phone fa-2x "></i> </a><br>
            <a href="#"><i class="fa-brands fa-facebook-f  fa-2x"></i></a>
        </div>
    </div>
</footer>
  
  <!-- Bootstrap and Font Awesome scripts -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>