<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
 <?php if(empty($data['posts'])):?>
  <div class="card card-body mb-3" style="height: 53vh;">
    <h4 class="card-title">My Journaling History</h4>
    <div class="bg-light p-2 mb-3">
      No records..
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/journal/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Journal</a>
    </div>
  </div>
  <?php else:?>
    <div class="row mb-3">
      <div class="col-md-6">
      <h1>Posts</h1>
      </div>
      <div class="col-md-6">
        <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/journal/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
      </div>
    </div>
    <?php foreach($data['posts'] as $post):?>
      <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
          Written <?php echo $post->created_at; ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <a class="btn btn-dark" href="<?php echo URLROOT; ?>/journal/show/<?php echo $post->postId; ?>">More</a>
      </div>
    <?php endforeach; ?>
  <?php endif;?>
<?php require APPROOT . '/views/inc/foot.php'; ?>