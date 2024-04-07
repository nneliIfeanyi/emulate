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
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-primary rounded-2">
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
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Total Income for the year."></i>
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
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Total Expense for the year."></i>
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
  <h6 class=""><?php echo date('M-Y') ?> |<span class="lead text-muted fs-6"> Current Month</span></h6>

  <div class="col-md-6">
    <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
      <h1 class="h6"><span class="text-muted">Income: </span>
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Recorded income for current Month."></i>
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
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Recorded expense for current Month."></i>
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
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Recorded income for current week."></i>
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
        <i class="fa fa-info-circle" data-bs-toggle="tooltip" data-bs-title="Recorded expense for current week."></i>
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
  <div class="col-md-10 mx-auto">
    <div class="mt-5">
      <?php if(!empty($data['posts'])):?>
      <table class="table">
        <thead>
          <tr class="border text-center">
            <th colspan="2"><span class="h4">Transaction History</span></th>
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
            <td class="col-3">
              <p style="font-size:13px;"><a href="<?php echo URLROOT?>/personal/edit/<?= $post->id?>" style="text-decoration: none;"><?php echo $post->amount ?></a></p>
            </td>
            <!-- Second Table data -->
            <td class="col-8" class="">
              <!-- Caption div -->
              <div class="float-end">
                <a href="<?php echo URLROOT?>/personal/edit/<?= $post->id?>" style="text-decoration: none; color: black;">
                  <?php echo $post->caption ?>
                </a>
              </div>
            </td><!-- Second Table data Ends -->
            <td class="col-1">
               <!-- Delete icon div -->
              <div class="float-end">
                <form action="<?php echo URLROOT?>/personal/delete/<?= $post->id?>" method="post">
                  <button type="submit" style="color: antiquewhite;background: darkred;border: 0;"><span class="fw-bold">&times;</span></button>
                </form>
              </div><!-- Delete icon div ends-->
            </td>
         </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          </tbody>
      </table>

      <div class="row my-5">
        <div class="col-md-6">
          <div class="d-grid mb-3">
            <a href="<?php echo URLROOT?>/personal/show" class="btn btn-outline-dark">
              <i class="fa fa-eye text-success"></i> Veiw all transactions
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-grid ">
            <a href="<?php echo URLROOT?>/personal/daily" class="btn btn-outline-dark">
              <i class="fa fa-eye text-success"></i> Veiw today's ..
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
</div>
  <div style="position: fixed;bottom: 1vh;right: 1vw;">
    <p data-bs-toggle="tooltip" data-bs-title="Add Transaction">
      <a href="<?php echo URLROOT;?>/personal/add" style="font-size: 22px;">
        <i class="fa fa-plus-circle fa-3x text-success"></i>
      </a>
    </p>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
