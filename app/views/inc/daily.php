<?php require APPROOT . '/views/inc/header.php'; ?>

<h1 class="h6 mb-3 text-center text-muted">Showing Selected Date: <span class="text-primary"><?php echo $data['date'].' '.$data['month'].' '.$data['year']; ?></span></h1>

<div class="table-responsive">
      <?php if(!empty($data['posts'])):?>
      <table id="example"class="display" style="width:100%;">
        <thead>
          <tr class="border">
            
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
           
            <td><?php echo $post->day.'-'.$post->d_num ?></td>
            <td><?php echo $post->type ?></td>
            <td><?php echo $post->caption ?></td>
             <td><?php echo $post->amount ?></td>
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          <tr>
            <th>Total</th>
            <th>Expense</th>
            <th> -- </th>
            <th>&#8358;<?= put_coma($data['expense'])?></th>
          </tr>
          <tr>
            <th>Total</th>
            <th>Income</th>
            <th> -- </th>
            <th>&#8358;<?= put_coma($data['income'])?></th>
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
   
  <div class="text-center mt-5">
    <a class=" btn btn-success" href="<?php echo URLROOT?>/personal/daily"><i class="fa fa-backward"></i> Return to current date</a>
  </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

<script>
  new DataTable('#example', {
    caption:"All Transactions For <?php echo $data['date'].' '.$data['month'].' '.$data['year']; ?>.",
    paging:false,
    ordering:false,
    info:false,
    searching:false,
    //scrollX:true,
    layout: {
        topStart: {
            buttons: ['copy', 'excel',
              { extend:'pdf',
                messageTop:'All Transactions For <?php echo $data['date'].' '.$data['month'].' '.$data['year']; ?>.',
                //messageBottom:'null'
              },
              { extend:'print',
                messageTop:'All Transactions For <?php echo $data['date'].' '.$data['month'].' '.$data['year']; ?>.',
                //messageBottom:'Stanvic Concepts'
              }]
        }
    }
});
</script>