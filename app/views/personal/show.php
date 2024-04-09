<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="flash-msg">
    <?php flash('msg');?>
  </div>
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h1 class="h2 text-center">All Recorded Transactions | Current year</h1>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
              <h1 class="h6 text-muted">Balance:</h1>
              <p class="font-weight-light">
                <?php if(empty($data['income'])):?>
                &#8358;0.00
                <?php else:?>
                &#8358;<?= put_coma($data['income'] - $data['expense']);?>
                <?php endif;?>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
              <h1 class="h6 text-muted">Income:</h1>
              <p class="font-weight-light">
                <?php if(empty($data['income'])):?>
                &#8358;0.00
                <?php else:?>
                &#8358;<?= put_coma($data['income'])?>
                <?php endif;?>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
              <h1 class="h6 text-muted">Expense:</h1>
              <p class="">
               <?php if(empty($data['expense'])):?>
               &#8358;0.00
               <?php else:?>
               &#8358;<?= put_coma($data['expense'])?>
               <?php endif;?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <?php if(!empty($data['posts'])):?>
        <div class="table-responsive">
      <table id="example"class="display" style="width:100%;">
        <thead>
          <tr class="border">
            <th>Day</th>
            <th>Date</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Action</th>
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
            <td><?php echo $post->day ?></td>
            <td><?php echo $post->d_num.','.' '.$post->month ?></td>
            <td><?php echo $post->caption ?></td>
            <td><?php echo $post->amount ?></td>
            <td>
              <div class="d-flex">
              <a href="<?php echo URLROOT;?>/personal/edit/<?php echo $post->id?>" 
                data-bs-toggle="tooltip" data-bs-title="Edit this transaction">
                <i class="fa fa-pencil text-success"></i>
              </a>&nbsp;&nbsp;

              <a href="javascript:void();" 
                data-bs-toggle="modal" data-bs-target="#deleteModal<?= $post->id ?>">
                <i class="fa fa-trash text-danger"></i>
              </a>
            </div>
                      <!--Delete post Modal -->
              <div class="modal fade" id="deleteModal<?= $post->id ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      This Action cannot be reveresed..
                      <p class="lead">Do you wish to Continue?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                      <form action="<?php echo URLROOT; ?>/personal/delete/<?php echo $post->id; ?>" method="post">
                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
         </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
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