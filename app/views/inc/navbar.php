<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 px-2">
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
          <a href="<?php echo URLROOT?>/personal/add" class="nav-link">Add</a>
        </li>
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
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>