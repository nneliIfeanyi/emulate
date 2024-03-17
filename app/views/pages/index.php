<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead"><?php echo $data['description']; ?></p>
      <div class="my-3">
        <a class="btn btn-success" href="<?php echo URLROOT?>/users/login">Login to Continue</a>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>