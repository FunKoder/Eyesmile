<?php include('includes/header.php');?>
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
  <!-- Navbar -->
  <?php include('includes/nav.php');?>



  <section class="sub-head bg-dark-blue py-5">
    <h2 class="text-light text-center mb-5">CONTACT US</h2>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-5 text-center bg-light rounded shadow">
            <div class="schedule">
              <i class="fa-solid fa-calendar fa-3x mb-3 mt-3"></i>
                <h3 class="text-center">Schedule</h3>
                <p class="text-center">Monday - Friday: 10:00 am - 5:00 pm</p>
                <p class="text-center">Saturday: 1:00 am - 5:00 pm</p>
                <p class="text-center">Sunday:Closed</p>
            </div>
        </div>
        <div class="col-md-6">
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3844.947154514948!2d120.9704343742511!3d15.487274454756133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33972926fb214f01%3A0xea72fc5603b40901!2sEye%20Smile%20Optical%20and%20Dental%20Clinic!5e0!3m2!1sen!2sph!4v1699261168781!5m2!1sen!2sph" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    </div>
</section>


<section class="services-container bg-blue py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4  " >
            <div class="contact bg-white shadow text-center py-4 px-3" style="height: 200px;">
              <i class="fa-solid fa-location-dot fa-2x mb-3"></i>
              <h3 class="mb-3">Address</h3>
              <p> 168 Mabini Street Extension,<br> Cabanatuan City, 3100 Nueva Ecija</p>
            </div>
          </div>
        <div class="col-lg-4  " >
          <div class="contact bg-white shadow text-center py-4 px-3" style="height: 200px;">
            <i class="fas fa-phone fa-2x mb-3"></i>
            <h3 class="mb-3">Call Or Text</h3>
            <p>0995 573 8727<br>09178683304</p>
          </div>
        </div>
        <div class="col-lg-4  " >
          <div class="contact bg-white shadow text-center py-4 px-3" style="height: 200px;">
            <i class="fa-brands fa-facebook-f fa-2x mb-3 "></i>
            <h3 class="mb-3">Facebook</h3>
            <p>EyeSmile Optical and Dental Clinic</p>
          </div>
        </div>
      </div>
    </div>
  </section>

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