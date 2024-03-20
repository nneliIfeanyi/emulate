<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light my-5">
        <?php flash('register_success'); ?>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
          <div class="form-group mb-3">
              <label>Email:</label>
              <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>    
          <div class="form-group mb-3">
              <label>Password:</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-row">
            <div class="col my-2">
              <input type="submit" class="btn btn-success btn-block" value="Login">
            </div>
            <div class="col my-2">
              <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-dark btn-block">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
