<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row my-3">
  <div class="col-lg-7 mx-auto">
    <h1 class="h6 mb-3 text-center text-muted"><span class="text-primary">Showing: Week <?php echo $data['week'].' '.'of'.' '.'year'.' '.$data['year']; ?></span></h1>
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
</div>

<div class="table-responsive">
      <?php if(!empty($data['posts'])):?>
      <table id="example"class="display" style="width:100%;">
        <thead>
          <tr class="border">
            <th>Day</th>
            <th>Date</th>
            <th>Category</th>
            <th>Caption</th>
            <th>Amount</th>
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
            <td><?php echo $post->type ?></td>
            <td><?php echo $post->caption ?></td>
             <td><?php echo $post->amount ?></td>
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          <tr>
           <th>Total</th>
            <th>expense</th>
            <th> -- </th>
            <th> -- </th>
            <th>
              <?php if(!empty($data['expense'])):?>
                &#8358;<?= put_coma($data['expense'])?>
              <?php else:?>
                &#8358;0.00
              <?php endif;?>
            </th>
          </tr>
          <tr>
            <th>Total</th>
            <th>income</th>
            <th> -- </th>
            <th> -- </th>
            <th>
              <?php if(!empty($data['income'])):?>
                &#8358;<?= put_coma($data['income'])?>
              <?php else:?>
                &#8358;0.00
              <?php endif;?>
            </th>
          </tr>
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

   <div class="text-center mt-5">
    <a class=" btn btn-success" href="<?php echo URLROOT?>/personal/current_week"><i class="fa fa-backward"></i> Return to current week</a>
  </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<script>
  new DataTable('#example', {
    caption:"Recorded Transactions Week <?php echo $data['week'].' '.'of'.' '.'year'.' '.$data['year']; ?>",
    paging:false,
    ordering:false,
    info:false,
    layout: {
        topStart: {
            buttons: ['copy', 'excel',
              { extend:'pdf',
                messageTop:'Recorded Transactions Week <?php echo $data['week'].' '.'of'.' '.'year'.' '.$data['year']; ?>',
                //messageBottom:'Stanvic Concepts'
              },
              { extend:'print',
                messageTop:'Recorded Transactions Week <?php echo $data['week'].' '.'of'.' '.'year'.' '.$data['year']; ?>',
                //messageBottom:'Stanvic Concepts'
              }]
        }
    }
});
</script>