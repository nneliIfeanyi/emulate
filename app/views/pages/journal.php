<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css" />
    <title>Stanvic Concepts | Journal</title>
  </head>
  <body>
<header class="header vh-100 text-center position-relative">
      <div
        class="text-container position-relative d-flex flex-column justify-content-center align-items-center h-100"
      >
        <h5 class="text-primary fs-5 fw-bold text-uppercase">The blog of my blog</h5>
        <h1 id="typing-text" class="display-1 fw-bold text-white">I am <?= $_SESSION['user_name'] ?></h1>

        <p class="roles text-white text-uppercase fs-6">
          <span>whispering to myself and listening at the same time</span>
        </p>

        <a href="<?php echo URLROOT?>/journal" class="btn btn-outline-light btn-lg mt-3">
          <div class="d-flex">
            <div class="me-3">
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="text-start">
              <span>My Journal</span>
            </div>
          </div>
        </a>

        <div class="social d-flex gap-3 position-absolute">
          <a href="#">
            <i class="fab fa-twitter fa-3x text-white"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram fa-3x text-white"></i>
          </a>
          <a href="#">
            <i class="fab fa-linkedin fa-3x text-white"></i>
          </a>
          <a href="#">
            <i class="fab fa-facebook fa-3x text-white"></i>
          </a>
          <a href="#">
            <i class="fab fa-youtube fa-3x text-white"></i>
          </a>
        </div>
      </div>
    </header>
  </body>
  </html>