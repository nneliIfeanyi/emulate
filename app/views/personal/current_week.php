<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="row mt-4 mb-3">
  <div class="col-lg-12 mx-auto">
    <h1 class="h6 mb-3 text-center text-muted">All Transactions For The Current Week<span class="text-success"><?= date('W') ?></span></h1>
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
    <div class="col-lg-10 mx-auto mb-3">
      <?php if(!empty($data['posts'])):?>
      <table class="table">
        <thead>
          <tr class="border text-center">
            <th colspan="2"><span class="text-success">Transaction Records For Current Week<span class="text-dark text-muted"><?php echo date('W'); ?></span></span></th>
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
            <td class="col-4 position-relative" style="position: relative;">
              <p style="font-size:11px;"><?php echo $post->amount ?></p>
              <p style="font-size:12px;position: absolute;right: 0;top: 0;font-weight: bolder;"><?php echo $post->day.$post->d_num ?></p>
            </td>
            <!-- <td class="col-1 fw-bold">
              
            </td> -->
            <!-- Second Table data -->
            <td class="col-7" class="text-center">
              <div class="float-end" style="font-size:12px;"><?php echo $post->caption ?></div>
            </td><!-- Second Table data Ends -->
            <td class="col-1" style="position: relative;">
               <!-- Delete icon div -->
              <div style="position: absolute;right: 0;top: 0;font-weight: bolder;">
                <form action="<?php echo URLROOT?>/personal/delete/<?= $post->id?>" method="post">
                  <button type="submit" style="color: red;border: 0;font-size: 15px; padding:0 5px"><span class="fw-bold">&times;</span></button>
                </form>
              </div><!-- Delete icon div ends-->
               <!-- Edit icon div -->
              <div style="position: absolute;right: 0;bottom: 0;font-weight: bolder;">
                <a style="font-size:11px;" href="<?php echo URLROOT?>/personal/edit/<?= $post->id?>">
                  Edit
                </a>
              </div><!-- Edit icon div end-->
            </td>
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
          </tbody>
      </table>
      
        <?php else:?>
          <div class="my-3 card card-body">
            <div class="card-title">
              <h6 class="text-success">Transaction Records For Current Week<span class="text-dark text-muted"><?php echo date('W'); ?></span></span></h6>
            </div>
            <p class="card-text">No records..</p>
            </div>
        <?php endif;?>
    </div>
  </div>

  <div class="row">
  <div class="col-12">
    <div class="card card-body mb-3">
      <h4 class="text-center card-title"><span class="text-success"> Navigate</span> <span class="text-muted"> to a previous week</span></h4>
      <div class="row"><div class="col-md-6"><?php flash('msg')?></div></div>
      <form action="<?php echo URLROOT?>/personal/current_week" method="POST">
        <div class="row">

        <div class="col-6 py-2 col-lg-4 form-group">
            <select class="form-control <?php echo (!empty($data['month_err'])) ? 'is-invalid' : ''; ?>" name="week">
              <option value="<?php echo date('W') ?>">Week <?php echo date('W') ?></option>
              <?php foreach($data['week'] as $week):?>
              <option value="<?php echo $week->week?>"><?php echo $week->week?></option>
              <?php endforeach;?>
            </select>
        </div>

        <div class="col-6 py-2 col-lg-4 form-group">
            <select class="form-control <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>" name="year">
              <option value="<?php echo date('Y')?>">Year <?php echo date('Y')?></option>
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
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>