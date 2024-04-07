<?php require APPROOT . '/views/inc/header.php'; ?>
<h1 class="h4 text-center">All Transactions For Today <br>
  <span class="lead text-muted fs-6"> <?= date('D').','.date('d-M') ?></span>
</h1>
<div class="flash-msg">
  <?php echo flash('msg')?>
</div>
 <!-- Current Day -->
<div class="row">
    <div class="col-lg-10 mx-auto">
       <div class="row">
         <div class="col-md-6">
           <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
             <h1 class="h6"><span class="text-muted">Income: </span>
             </h1>
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
             <h1 class="h6"><span class="text-muted">Expense: </span>
             </h1>
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
<!-- Current Day ends -->       

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
              </a>

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
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                      <form action="<?php echo URLROOT; ?>/personal/delete/<?php echo $post->id; ?>" method="post">
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
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
            <h6>Today's Record</h6>
          </div>
          <p class="card-text">No records yet.</p>
          </div>
      <?php endif;?>

      <div class="row my-5">
        <div class="col-md-6">
          <div class="d-grid mb-3">
            <a href="<?php echo URLROOT?>/personal/current_week" class="btn btn-outline-dark">
              <i class="fa fa-eye"></i> Veiw Current Week
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-grid">
            <a href="<?php echo URLROOT?>/personal/add" class="btn btn-outline-dark">
              <i class="fa fa-plus"></i> Add Transaction
            </a>
          </div>
        </div>
      </div>

    <div class="card card-body mb-3">
      <h4 class="text-center card-title"><span class="text-success"> Navigate</span> <span class="text-muted"> to a recorded previous day</span></h4>
      <form action="<?php echo URLROOT?>/personal/daily" method="POST">
        <div class="row">
          <div class="col-6 py-2 col-lg-3 form-group">
            <select class="form-control <?php echo (!empty($data['day_err'])) ? 'is-invalid' : ''; ?>" name="date">
            <option value="">Date</option>
            <?php foreach($data['date'] as $date):?>
                <option value="<?php echo $date->d_num?>"><?php echo $date->d_num?></option>
            <?php endforeach;?>
            </select>
          </div>

        <div class="col-6 py-2 col-lg-3 form-group">
            <select class="form-control <?php echo (!empty($data['month_err'])) ? 'is-invalid' : ''; ?>" name="month">
              <option value="<?php echo date('M')?>"><?php echo date('M')?></option>
              <?php foreach($data['month'] as $month):?>
              <option value="<?php echo $month->month?>"><?php echo $month->month?></option>
              <?php endforeach;?>
            </select>
        </div>

        <div class="col-6 py-2 col-lg-3 form-group">
            <select class="form-control <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" name="year">
              <option value="<?php echo date('Y')?>"><?php echo date('Y')?></option>
              <?php foreach($data['year'] as $year):?>
              <option value="<?php echo $year->year?>"><?php echo $year->year?></option>
              <?php endforeach;?>
            </select>
        </div>

        <div class="col-6 col-lg-3 form-group">
          <div class="d-grid">
           <button type="submit" class="btn btn-success">Navigate</button> 
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

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
    caption:"All Recorded Transactions year <?= date('Y') ?>",
    ordering:false,
    info:false,
    paging:false,
});
</script>
