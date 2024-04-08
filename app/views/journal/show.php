<?php require APPROOT . '/views/inc/header.php';$post_time = strtotime($data['post']->created_at);?>
  <a href="<?php echo URLROOT; ?>/journal" class="btn btn-light mb-3"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
  <br>
  <h1><?php echo $data['post']->title; ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['user']->name; ?> <?php echo to_time_ago($post_time); ?>
  </div>
  <p><?php echo $data['post']->body; ?></p>
  <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <div class="d-flex">
      <a class="btn btn-dark" href="<?php echo URLROOT; ?>/journal/edit/<?php echo $data['post']->id; ?>">Edit</a>

      <form class="float-end" action="<?php echo URLROOT; ?>/journal/delete/<?php echo $data['post']->id; ?>" method="post">
        <input type="submit" class="btn btn-danger" value="Delete">
      </form>
    </div>
  <?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>