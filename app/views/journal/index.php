<?php require APPROOT . '/views/inc/joe/header.php'; ?>
  <div class="flash-msg"><?php flash('msg'); ?></div>
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
      <h1>My Wall</h1>
      </div>
    
    <div class="col-md-6">
      <a class="btn btn-primary float-end" href="<?php echo URLROOT; ?>/journal/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
    </div>
  </div>
    <?php foreach($data['posts'] as $post):?>
      <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
        <?php if(!empty($post->date_)):?>
          Written <span class="text-muted"><?php echo $post->date_.' '.$post->month; ?></span>
          at <span class="text-muted"><?php echo $post->created_time; ?> </span>
        <?php else:?>
          Written <span class="text-muted"><?php echo $post->created_date; ?></span>
        <?php endif;?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <a class="btn btn-dark" href="<?php echo URLROOT; ?>/journal/show/<?php echo $post->postId; ?>">More</a>
      </div>
    <?php endforeach; ?>
  <?php endif;?>
  <div style="position: fixed;bottom: 1vh;right: 1vw;">
    <p data-bs-toggle="tooltip" data-bs-title="Add Journal">
      <a href="<?php echo URLROOT;?>/journal/add" style="font-size: 22px;">
        <i class="fa fa-plus-circle fa-3x text-primary"></i>
      </a>
    </p>
  </div>
<?php require APPROOT . '/views/inc/joe/foot.php'; ?>