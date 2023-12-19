 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg py-3 bg-white shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">
      <?= webSetting('title') ?? 'Website'; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment.html">Appointment</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
