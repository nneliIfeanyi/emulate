<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-4">
    <h1 class="h4 text-muted">Balance:</h1>
    <p class="font-weight-bold">&#8358;0.00</p>
  </div>
  <div>
    <?php echo date("l js")
  </div>
</div>
<div class="row">
  <div class="col-md-4">
      <div class="card card-body bg-light mb-5">
        <h2>Add Transaction</h2>
        
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
          <div class="form-group">
              <label>Amount:</label>
              <input type="number" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Description:</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
  </div>

  <div class="col-md-8">
      <div class="card card-body bg-light">
        <h5>Today's Record</h5>
        
        
      </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
