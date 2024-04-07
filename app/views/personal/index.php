<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="flash-msg">
    <?php flash('msg');?>
</div>
<div class="row">
  <div class="col-12" style="overflow: hidden;">
    <p class="float-end pe-1 mb-3">
      <i class="fa fa-user"></i>&nbsp;
      <?php echo GREET.' '. $_SESSION['user_name'];?>
    </p>
  </div>
</div>
<div class="row border-bottom mb-4 pb-2">
  <h5>Account Summary | Year <?php echo date('Y') ?><br>
    <span class="lead text-muted fs-6"> Click <i class="fa fa-info-circle"></i> for more info</span>
  </h5>
  <div class="col-md-4"> 
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-dark rounded-2">
      <h1 class="h6">Balance: 
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Available Cash."></i>
      </h1>
      <p class="font-weight-bold">
       <?php if(empty($data['expense']) AND empty($data['income'])):?>
       &#8358;0.00
       <?php elseif($data['expense'] > $data['income']):?>
        <span class="text-danger"><?= $data['income'] - $data['expense']?></span>
       <?php else:?>
       &#8358;<?= put_coma($data['income'] - $data['expense'])?>
       <?php endif;?>
      </p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
      <h1 class="h6"><span class="text-muted">Income: </span>
        <i class="fa fa-info-circle text-success" data-bs-toggle="tooltip" data-bs-title="Total Income for the year."></i>
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
  <div class="col-md-4">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
      <h1 class="h6"><span class="text-muted">Expense: </span>
        <i class="fa fa-info-circle text-danger" data-bs-toggle="tooltip" data-bs-title="Total Expense for the year."></i>
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

  <a class="text-dark fs-6" 
    style="text-decoration: none;" href="<?php echo URLROOT?>/personal/show">
    Go to all transactions 
    <i class="fa fa-arrow-right"></i>
  </a>
</div>

<!--Current Month view -->

<div class="row border-bottom mb-4 pb-2">
  <h6 class=""><?php echo date('M') ?> summary |<span class="lead text-muted fs-6"> Current Month</span></h6>

  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
      <h1 class="h6"><span class="text-muted">Income: </span>
        <i class="fa fa-info-circle text-success" data-bs-toggle="tooltip" data-bs-title="Recorded income for current Month."></i>
      </h1>
      <p class="font-weight-light">
        <?php if(empty($data['month_income'])):?>
        &#8358;0.00
        <?php else:?>
        &#8358;<?= put_coma($data['month_income'])?>
        <?php endif;?>
      </p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
      <h1 class="h6"><span class="text-muted">Expense: </span>
        <i class="fa fa-info-circle text-danger" data-bs-toggle="tooltip" data-bs-title="Recorded expense for current Month."></i>
      </h1>
      <p class="">
       <?php if(empty($data['month_expense'])):?>
       &#8358;0.00
       <?php else:?>
       &#8358;<?= put_coma($data['month_expense'])?>
       <?php endif;?>
      </p>
    </div>
  </div>
  <a class="text-dark fs-6" 
    style="text-decoration: none;" href="<?php echo URLROOT?>/personal/monthly">
    Go to current month 
    <i class="fa fa-arrow-right"></i>
  </a>
</div>

<!-- Current Week -->
<div class="row border-bottom mb-4 pb-2">
  <h6>This Week |<span class="lead text-muted fs-6"> Week <?= date('W')?>  
    <i class="fa fa-info-circle" 
      data-bs-toggle="tooltip" 
      data-bs-title="New week begins on Monday, Sunday is last day of the week.">
    </i>
  </h6>
  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
      <h1 class="h6"><span class="text-muted">Income: </span>
        <i class="fa fa-info-circle text-success" data-bs-toggle="tooltip" data-bs-title="Recorded income for current week."></i>
      </h1>
      <p class="font-weight-light">
        <?php if(empty($data['weekIncome'])):?>
        &#8358;0.00
        <?php else:?>
        &#8358;<?= put_coma($data['weekIncome'])?>
        <?php endif;?>
      </p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
      <h1 class="h6"><span class="text-muted">Expense: </span>
        <i class="fa fa-info-circle text-danger" data-bs-toggle="tooltip" data-bs-title="Recorded expense for current week."></i>
      </h1>
      <p class="">
       <?php if(empty($data['weekExpense'])):?>
       &#8358;0.00
       <?php else:?>
       &#8358;<?= put_coma($data['weekExpense'])?>
       <?php endif;?>
      </p>
    </div>
  </div>
  <a class="text-dark fs-6" 
    style="text-decoration: none;" href="<?php echo URLROOT?>/personal/current_week">
    Go to current week 
    <i class="fa fa-arrow-right"></i>
  </a>
</div>


<!-- Current Day -->

<div class="row pb-2">
  <h6>Today |<span class="lead text-muted fs-6"> <?= date('D').','.date('d-M') ?></span></h6>
  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
      <h1 class="h6"><span class="text-muted">Income: </span>
      </h1>
      <p class="font-weight-light">
        <?php if(empty($data['day_income'])):?>
        &#8358;0.00
        <?php else:?>
        &#8358;<?= put_coma($data['day_income'])?>
        <?php endif;?>
      </p>
    </div>
  </div>
  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
      <h1 class="h6"><span class="text-muted">Expense: </span>
      </h1>
      <p class="">
       <?php if(empty($data['day_expense'])):?>
       &#8358;0.00
       <?php else:?>
       &#8358;<?= put_coma($data['day_expense'])?>
       <?php endif;?>
      </p>
    </div>
  </div>
  <a class="text-dark fs-6" 
    style="text-decoration: none;" href="<?php echo URLROOT?>/personal/daily">
    View today 
    <i class="fa fa-arrow-right"></i>
  </a>
</div>



<div class="row">
  <div class="col-md-7">
    <div class="mt-5">
      <?php if(!empty($data['posts'])):?>
        <h6>Recent Transactions</h6>
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

      <div class="row mt-5">
        <div class="col-md-6">
          <div class="d-grid mb-3">
            <a href="<?php echo URLROOT?>/personal/show" class="btn btn-outline-dark">
              Load all transactions <i class="fa fa-angle-right text-success"></i>
            </a>
          </div>
        </div>
      </div>
        <?php else:?>
          <div class="my-3 card card-body">
            <div class="card-title">
              <h6>History</h6>
            </div>
            <p class="card-text">No records yet.</p>
            <div class="card-footer">
              <a href="<?php echo URLROOT?>/personal/show" class="btn"><i class="fa fa-eye"></i> Veiw previous transactions</a>
            </div>
          </div>
        <?php endif;?>
    </div>
  </div>

<!-- ADD TRANSACTION -->

    <div class="col-md-5 mt-5">
      <h6 class="mb-3">Add Transaction</h6>
      <div class="card card-body bg-light">
        <form action="<?php echo URLROOT; ?>/personal/add" method="post">
          <div class="form-group mb-2">
              <label>Select transaction type:</label><span class="text-danger" style="font-size:20px;">*</span>
              <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type">
                <option value="">---</option>
                <option value="expense">Expenses</option>
                <option value="income">Income</option>
              </select>
              <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
          </div>
          <div class="form-group mb-2">
              <label>Amount:</label><span class="text-danger" style="font-size:20px;">*</span>
              <input type="number" name="amount" class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['amount']; ?>" placeholder="">
              <span class="invalid-feedback"><?php echo $data['amount_err']; ?></span>
          </div>

          <div class="form-group mb-3">
              <label>Caption:</label>
              <textarea name="caption" class="form-control <?php echo (!empty($data['caption_err'])) ? 'is-invalid' : ''; ?>" placeholder="eg.. airtime recharge"><?php echo $data['caption']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['caption_err']; ?></span>
          </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Add</button>
            <a href="<?php echo URLROOT?>/personal/daily" class="btn btn-outline-dark"><i class="fa fa-eye"></i> View Today</a>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>
