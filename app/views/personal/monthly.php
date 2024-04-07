<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="flash-msg">
    <?php flash('msg');?>
</div>
<div class="row mb-3">
  <div class="col-lg-10 mx-auto">
    <h1 class="h6 mb-3 text-center text-muted">All Transactions For Current Month <span class="text-success"><?= date('M') ?></span></h1>
    <div class="row">
      <div class="col-md-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
          <p class="h6 text-muted">Income:</p>
          <p class="font-weight-light">
            <?php if(empty($data['income'])):?>
            &#8358;0.00
            <?php else:?>
            &#8358;<?= put_coma($data['income'])?>.00
            <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
          <p class="h6 text-muted">Expense:</p>
          <p class="">
           <?php if(empty($data['expense'])):?>
           &#8358;0.00
           <?php else:?>
           &#8358;<?= put_coma($data['expense'])?>.00
           <?php endif;?>
          </p>
        </div>
      </div>
    </div><!-- Ends Cards row -->

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
              <a href="<?php echo URLROOT;?>/personal/edit/<?php echo $post->id?>" 
                data-bs-toggle="tooltip" data-bs-title="Edit this transaction">
                <i class="fa fa-pencil text-success"></i>
              </a>&nbsp;

              <a href="javascript:void();" 
                data-bs-toggle="modal" data-bs-target="#deleteModal<?= $post->id ?>">
                <i class="fa fa-trash text-danger"></i>
              </a>

                      <!--Delete post Modal -->
              <div class="modal fade" id="deleteModal<?= $post->id ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      This Action cannot be reveresed..
                      <p class="lead">Do you wish to Continue?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
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
      <div class="row my-4">
        <div class="col-md-6 mx-auto">
          <div class="d-grid mx-4">
            <a href="<?php echo URLROOT;?>/pages/download" class="btn btn-outline-dark">Download options</a>
            <!-- <form action="<?php echo URLROOT;?>/pages/download">
              <input type="submit" name="download" value="Download options" class="btn btn-outline-primary">
            </form> -->
          </div>
        </div>
      </div>
      <?php else:?>
        <div class="my-3 card card-body">
          <div class="card-title">
            <h6 class="text-success">Transaction Records For Current Month <span class="text-dark text-muted"><?php echo date('M');?></span></span></h6>
          </div>
          <p class="card-text">No records..</p>
        </div>
      <?php endif;?>
  </div>
</div>


<!-- Navigate row starts -->

    <!-- <div class="card card-body mb-3">
      <h4 class="text-center card-title"><span class="text-success"> Navigate</span> <span class="text-muted"> to a previous month</span></h4>
      <form action="<?php echo URLROOT?>/personal/current_week" method="POST">
        <div class="row">

        <div class="col-6 py-2 col-lg-4 form-group">
            <select class="form-control <?php echo (!empty($data['month_err'])) ? 'is-invalid' : ''; ?>" name="month">
              <option value="<?php echo date('M') ?>"><?php echo date('M') ?></option>
              <?php foreach($data['week'] as $week):?>
              <option value="<?php echo null ?>"><?php echo null ?></option>
              <?php endforeach;?>
            </select>
        </div>

        <div class="col-6 py-2 col-lg-4 form-group">
            <select class="form-control <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" name="year">
              <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
              <?php foreach($data['year'] as $year):?>
              <option value="<?php echo $year->year?>"><?php echo $year->year?></option>
              <?php endforeach;?>
            </select>
        </div>

        <div class="col-6 col-lg-4 form-group">
          <div class="d-grid">
           <button type="submit" class="btn btn-success">Navigate</button> 
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div> -->

  <div style="position: fixed;bottom: 1vh;right: 1vw;">
    <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
      <a href="<?php echo URLROOT;?>/personal/add" style="font-size: 22px;">
        <i class="fa fa-plus-circle fa-3x text-success"></i>
      </a>
    </p>
  </div>

<?php require APPROOT . '/views/inc/foot.php'; ?>
<script>
  new DataTable('#example', {
    caption:"All Recorded Transactions <?= date('M-Y') ?>",
    ordering:false,
    info:false,
});
</script>