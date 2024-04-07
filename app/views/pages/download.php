<?php require APPROOT . '/views/inc/header.php'; ?>
	
	<a href="<?php echo URLROOT;?>/personal/current_week" class="btn">
		<i class="fa fa-backward"></i> Back
	</a>
  <div class="table-responsive">
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
          	<th>Week <?= date('W') ?></th>
          	<th>Total</th>
          	<th>Expense</th>
          	<th>&#8358;<?= put_coma($data['expense'])?></th>
          </tr>
          <tr>
          	<th>Week <?= date('W') ?></th>
          	<th>Total</th>
          	<th>Income</th>
          	<th>&#8358;<?= put_coma($data['income'])?></th>
          </tr>
          </tbody>
      </table>
    </div>
	<?php require APPROOT . '/views/inc/foot.php'; ?>

	<script>
  new DataTable('#example', {
    caption:"All Transactions For The Current Week <?= date('W') ?>.",
    paging:false,
    ordering:false,
    info:false,
    searching:false,
    layout: {
        topStart: {
            buttons: ['copy', 'excel',
              { extend:'pdf',
                messageTop:'All Transactions For The Current Week <?= date('W') ?>.',
                //messageBottom:'null'
              },
              { extend:'print',
                messageTop:'All Transactions For The Current Week <?= date('W') ?>.',
                //messageBottom:'Stanvic Concepts'
              }]
        }
    }
});
</script>