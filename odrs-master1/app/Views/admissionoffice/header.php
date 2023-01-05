<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@4.0.5/bootstrap-4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/sl-1.3.1/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url('css/student/student.css'); ?>">
    
    <title>ODRS</title>

  </head>
  <main class="page-content" id="content">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
          <img src="<?php echo base_url('img/pupt-logo.png'); ?>" alt="">
          <!-- hindi ko alam bakit sa isang page hindi nagview ang logo hmpk -->
          <a class="navbar-brand" href="">
              PUP Taguig | Admission Credentials Tracking System
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link sideLink active" href=""> </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link sideLink" href=""></a>
                  </li>
              </ul>
              <ul class="navbar-nav logout">
                  <li class="nav-item dropdown d-flex">
                      <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="far fa-user-circle"></i> <?php echo $_SESSION['username']; ?>
                      </a>
                      <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/logout">Logout <i class="fas fa-sign-out-alt"></i></a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
    </nav>