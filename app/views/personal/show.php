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
      <table id="example"class="display" style="width:100%;">
        <thead>
          <tr class="border">
            <th>Amount</th>
            <th>Date</th>
            <th>Caption</th>
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
          <tr class="border">

            <!-- First Table data -->
            <td><?php echo $post->amount ?></td>
            <td><?php echo $post->day.'-'.$post->d_num ?></td>
            <td><?php echo $post->caption ?></td>
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
    <a href="<?php echo URLROOT; ?>" class="btn">
      <i class="fa fa-backward" aria-hidden="true"></i>
        Go Back
      </a>
    </div>
    <div style="position: fixed;bottom: 1vh;right: 1vw;">
      <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
        <a href="<?php echo URLROOT;?>/personal/add" style="font-size: 22px;">
          <i class="fa fa-plus-circle fa-3x text-success"></i>
        </a>
      </p>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

<script>
  new DataTable('#example', {
    caption:"All Recorded Transactions year <?= date('Y') ?>",
    ordering:false,
    info:false,
    // layout: {
    //     topStart: {
    //         buttons: ['copy', 'excel',
    //           { extend:'pdf',
    //             messageTop:'All Transactions',
    //             //messageBottom:'Stanvic Concepts'
    //           },
    //           { extend:'print',
    //             messageTop:'All Transactions',
    //             //messageBottom:'Stanvic Concepts'
    //           }]
    //     }
    // }
});
</script>