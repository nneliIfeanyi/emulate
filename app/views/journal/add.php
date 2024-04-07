<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/journal" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
<div class="card card-body bg-light my-5">
  <h2>Add to your Journal</h2>
  <p>Create a Journal with this form</p>
  <form action="<?php echo URLROOT; ?>/journal/add" method="post">
    <div class="form-group mb-3">
        <label>Mood:</label>
        <select class="form-control form-control-lg" name="title">
          <option value="">Select mood..</option>
          <option value="Prayer">Prayer</option>
          <option value="Failures">Failures</option>
          <option value="Heart desire">Heart desire</option>
          <option value="Confession">Confession</option>
          <option value="Testimonies">Testimonies</option>
          <option value="Visions">Visions</option>
          <option value="Dreams">Dreams</option>
          <option value="Success story">Success story</option>
        </select>
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
    </div>    
    <div class="form-group mb-3">
        <label>My Thoughts:</label>
        <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
    </div>
    <input type="submit" class="btn btn-success" value="Submit">
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
