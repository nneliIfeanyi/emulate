<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
      <div class="col-12 mx-auto text-center">
        <h1 class="h4 text-center">All Transactions For Today</h1>
        <div class="row">
      <div class="col-6 col-lg-3">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-primary rounded-2">
          <p class="h6">Balance:</p>
          <p class="font-weight-bold">
           <?php if(empty($data['expense']) AND empty($data['income'])):?>
           &#8358;0.00
           <?php elseif($data['expense'] > $data['income']):?>
            <span class="text-danger"><?= $data['income'] - $data['expense']?></span>
           <?php else:?>
           &#8358;<?= put_coma($data['income'] - $data['expense'])?>.00
           <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
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
      <div class="col-6 col-lg-3">
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
      <div class="col-6 col-lg-3">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-dark rounded-2">
          <p class="h6 text-muted">Tithe:</p>
          <p class="">
           <?php if(empty($data['income'])):?>
           &#8358;0.00
           <?php else:?>
           &#8358;<?= tithe($data['income']) ?>
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
      <table class="table">
        <thead>
          <tr class="border">
            <th colspan="3" class="text-center"><span class="text-success">Today's Record</span></th>
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
      
        <?php else:?>
          <div class="my-3 card card-body">
            <div class="card-title">
              <h6>Today's Record</h6>
            </div>
            <p class="card-text">No records yet.</p>
            </div>
        <?php endif;?>
    </div>
  </div>
<div class="row my-3">
  <div class="text-center col-lg-6 shadow py-2 rounded-2">
    <a href="<?php echo URLROOT?>/personal/current_week">
      <i class="fa fa-eye"></i> Veiw All Transactions For Current Week
    </a>
  </div>
  <div class="text-center col-lg-6 shadow py-2 rounded-2">
    <a href="<?php echo URLROOT?>/personal/add">
      <i class="fa fa-plus"></i> Add Transaction
    </a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card card-body mb-3">
      <h4 class="text-center card-title"><span class="text-success"> Navigate</span> <span class="text-muted"> to a previous day</span></h4>
      <div class="row"><div class="col-md-6"><?php flash('msg')?></div></div>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>
