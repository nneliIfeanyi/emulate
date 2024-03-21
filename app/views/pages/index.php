<!-- <?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead"><?php echo $data['description']; ?></p>
      <div class="my-3">
        <a class="btn btn-success" href="<?php echo URLROOT?>/users/login">Login to Continue</a>
      </div>
    </div>
  </div> -->
<!DOCTYPE html>
<html lang="en">
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />

  <title><?php echo SITENAME; ?></title>
</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
  <div class="container">
    <a class="navbar-brand text-success fw-bold" href="<?php echo URLROOT?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/journal">Journal</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a href="<?php echo URLROOT?>/personal/daily" class="nav-link">Daily</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo URLROOT?>/personal/current_week" class="nav-link">Weekly</a>
        </li>
        <li class="nav-item">
          <a href="<?php echo URLROOT?>/personal/monthly" class="nav-link">Monthly</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </li>
      <?php else : ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>


  <header class="header py-7">
      <div class="container">
        <div class="row mb-5 text-center">
          <div class="col-12 text-container">
            <h1 class="display-2 text-white mt-3">
              Monitor your income and expenditure with ease.
            </h1>
            <p class="lead w-75 m-auto p-5 mb-3" style="color: antiquewhite;">
              Keep track of your financial flow, know how much you spent and how much you made. Only what you record, would be recorded.
            </p>
            <a href="<?php echo URLROOT?>/users/login" class="btn btn-success text-uppercase">
              Begin now
            </a>
            <!-- <a href="#discover" class="btn btn-outline-light text-uppercase">
              Discover
            </a> -->
          </div>
        </div>
        <div class="row">
          <div class="col-12 py-3">
            <!-- Image Slider -->
            <div id="slider" class="carousel slide" data-bs-ride="carousel">
              <!-- <div class="carousel-indicators">
                <button
                  class="active"
                  type="button"
                  data-bs-slide-to="0"
                  data-bs-target="#slider"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-slide-to="1"
                  data-bs-target="#slider"
                  aria-label="Slide 2"
                ></button>
                <button
                  type="button"
                  data-bs-slide-to="2"
                  data-bs-target="#slider"
                  aria-label="Slide 3"
                ></button>
              </div> -->
              <div class="carousel-inner rounded-5">
                <!-- <div class="carousel-item active">
                  <img
                    src="images/img1.png"
                    alt=""
                    class="d-block w-100 rounded-5"
                  />
                </div> -->
                <div class="carousel-item active">
                  <img
                    src="images/img3.png"
                    alt=""
                    class="d-block w-100 rounded-5"
                  />
                </div>
                <!-- <div class="carousel-item">
                  <img
                    src="images/img.jpg"
                    alt=""
                    class="d-block w-100 rounded-5"
                  />
                </div> -->
              </div>
              <!-- Buttons -->
              <!-- <button
                class="carousel-control-prev"
                type="button"
                data-bs-slide="prev"
                data-bs-target="#slider"
              >
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-slide="next"
                data-bs-target="#slider"
              >
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
              </button> -->
            </div>
          </div>
        </div>
      </div>
    </header>
<?php require APPROOT . '/views/inc/footer.php'; ?>