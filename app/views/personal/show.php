<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- <div class="row">
      <div class="col-lg-7 mx-auto">
        <h1 class="h2 text-center">All Transactions For Today</h1>
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
        </div>
      </div>
    </div> -->
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <?php if(!empty($data['posts'])):?>
      <table class="table">
        <thead>
          <tr class="border text-center">
            <th colspan="2">All Transactions</th>
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
            <td class="col-4 position-relative" style="position: relative;">
              <p style="font-size:11px;"><?php echo $post->amount ?></p>
              <p style="font-size:12px;position: absolute;right: 0;top: 0;font-weight: bolder;"><?php echo $post->day ?></p>
            </td>
            <!-- Second Table data -->
            <td class="col-7">
              <!-- Caption div -->
              <div style="font-size:13px;" class="float-end"><?php echo $post->caption ?></div>
            </td><!-- Second Table data Ends -->
            <td class="col-1">
               <!-- Edit icon div -->
              <div class="float-end">
                <a href="<?php echo URLROOT?>/personal/edit/<?= $post->id?>">
                  Edit
                </a>
              </div><!-- Edit icon div end-->
            </td>
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          </tbody>
      </table>
      
        <?php else:?>
          <div class="my-3 card card-body">
            <div class="card-title">
              <h6>History</h6>
            </div>
            <p class="card-text">No records yet.</p>
            </div>
        <?php endif;?>
    </div>
  </div>
    <div class="text-center">
    <a href="<?php echo URLROOT; ?>" class="btn btn-dark mb-1">
      <i class="fa fa-backward" aria-hidden="true"></i>
        Go Back
      </a>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>