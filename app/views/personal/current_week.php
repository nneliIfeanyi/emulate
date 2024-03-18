<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row mt-4 mb-5">
  <div class="col-lg-8 mx-auto">
    <h1 class="h5 mb-5 text-center text-muted">All Daily Transactions For The Current Week<span class="text-success"><?= date('W') ?></span></h1>
    <div class="row">
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
          <h1 class="h6 text-muted">Income:</h1>
          <p class="font-weight-light">
            <?php if(empty($data['income'])):?>
            &#8358;0.00
            <?php else:?>
            &#8358;<?= put_coma($data['income'])?>.00
            <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
          <h1 class="h6 text-muted">Expense:</h1>
          <p class="">
           <?php if(empty($data['expense'])):?>
           &#8358;0.00
           <?php else:?>
           &#8358;<?= put_coma($data['expense'])?>.00
           <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-dark rounded-2">
          <h1 class="h6 text-muted">Tithe:</h1>
          <p class="">
           <?php if(empty($data['income'])):?>
           &#8358;0.00
           <?php else:?>
           &#8358;<?= tithe($data['income']) ?>
           <?php endif;?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-lg-10 mx-auto mb-5">
      <?php if(!empty($data['posts'])):?>
      <table class="table">
        <thead>
          <tr class="border">
            <th colspan="2"><span class="text-success">Transaction Records For Current Week<span class="text-dark text-muted"><?php echo date('W'); ?></span></span></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data['posts'] as $post) : 
              if ($post->type == 'expense') {
              $post->amount = "<span class='text-danger font-weight-bold'>"."-".put_coma($post->amount)."</span>";
            }else{
              $post->amount = "<span class='text-success font-weight-bold'>"."+".put_coma($post->amount)."</span>";
            }

          ?>
          <tr class="border row">
            <!-- First Table data -->
            <td class="col-3">
              <p style="font-size:11px;"><?php echo $post->amount ?></p>
            </td>
            <td class="col-1 fw-bold">
              <p style="font-size:11px;"><?php echo $post->day.'.' ?></p>
            </td>
            <!-- Second Table data -->
            <td class="col-8" class="text-center">
              <div class="float-end"><?php echo $post->caption ?></div>
            </td><!-- Second Table data Ends -->
          
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          </tbody>
      </table>
      
        <?php else:?>
          <div class="my-3 card card-body">
            <div class="card-title">
              <h6 class="text-success">Transaction Records For Current Week<span class="text-dark text-muted"><?php echo date('W'); ?></span></span></h6>
            </div>
            <p class="card-text">No records..</p>
            </div>
        <?php endif;?>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>