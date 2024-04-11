<?php require APPROOT . '/views/inc/header.php'; ?>
	
	<a href="<?php echo URLROOT;?>/personal/current_week" class="btn">
		<i class="fa fa-backward"></i> Back
	</a>
  <div class="table-responsive">
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
	<?php require APPROOT . '/views/inc/foot.php'; ?>

	<script>
  new DataTable('#example', {
    caption:"Recorded Transactions For The Current Month <?= date('M') ?>.",
    paging:false,
    ordering:false,
    info:false,
    searching:false,
    layout: {
        topStart: {
            buttons: ['copy', 'excel',
              { extend:'pdf',
                messageTop:'Recorded Transactions For The Current Month <?= date('M') ?>.',
                //messageBottom:'null'
              },
              { extend:'print',
                messageTop:'Recorded Transactions For The Current Month <?= date('M') ?>.',
                //messageBottom:'Stanvic Concepts'
              }]
        }
    }
});
</script>