<?php include('includes/header.php');

?>

<body>
<?php include('includes/nav.php');?>
<?php include('includes/script-links.php');?>
  <!-- Page Content -->
  <div class="bg-image d-flex justify-content-center align-items-center" style="  background-image:linear-gradient(rgba(37, 41, 88, 0.75),rgba(37,41,88,0.75)),url(bg.jpg);">
    <div class="content text-center">
        <h1 class="text-light"> <?= webSetting('small_description') ?? 'Meta Desc'; ?></h1>
        <p class="text-light"><?= webSetting('meta_description') ?? 'Meta Desc'; ?></p>
      <div style="margin: auto;">
        <button type="button" class="btn btn-link py-2"><span></span> BOOK AN APPOINTMENT</button>
        <button type="button" class="btn btn-link py-2"><span></span> LEARN MORE</button>   
    </div>
    </div>
  </div>
  </section>

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
                    <img src="assets/img/pic2.jpg" class="w-100 rounded " alt="Img" style="min-height:300px;max-height:300px;">
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

  <section class="sub-head bg-dark-blue py-5">
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
            <?= webSetting('iframe') ?? ''; ?>
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
              <p>Address: <?= webSetting('address') ?? ''; ?></p>
            </div>
          </div>
        <div class="col-lg-4  " >
          <div class="contact bg-white shadow text-center py-4 px-3" style="height: 200px;">
            <i class="fas fa-phone fa-2x mb-3"></i>
            <h3 class="mb-3">Call Or Text</h3>
            <p>Contact No: <?= webSetting('phone1') ?? ''; ?></p>
            <p>Contact No. <?= webSetting('phone2') ?? ''; ?></p>
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
                <li><a href="login/login.php">Log in</a></li>
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