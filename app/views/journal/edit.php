<?php require APPROOT . '/views/inc/joe/header.php'; ?>
<a href="<?php echo URLROOT; ?>/journal" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light my-5">
        <h2>Edit Journal</h2>
        <p>Change the details of this Journal</p>
        <form action="<?php echo URLROOT; ?>/journal/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group mb-3">
              <label>Mood:</label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group mb-3">
              <label>My Thoughts:</label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success" value="Submit">
        </form>
      </div>
<?php require APPROOT . '/views/inc/joe/footer.php'; ?>
