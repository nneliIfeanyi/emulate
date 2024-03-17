<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row shadow">
  <div class="col-md-6">
    <h6><?php echo flash('msg');?></h6>
    <div class="row">
      <div class="col-6">
        <h1 class="h5 text-muted">Your Balance:</h1>
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
      <div class="col-6">
        <h1 class="h6 text-muted">Tithe:</h1>
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
  <div class="col-md-6">
    <div class="row">
      <div class="col-6">
        <h1 class="h6 text-muted">Income:</h1>
        <p class="font-weight-light">
          <?php if(empty($data['income'])):?>
          &#8358;0.00
          <?php else:?>
          &#8358;<?= put_coma($data['income'])?>.00
          <?php endif;?>
        </p>
      </div>
      <div class="col-6">
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
  <!-- <div class="col-md-6">
    <div class="d-flex justify-content-between">
      <p class="">Good Morning <span class="font-weight-bold text-muted"><?php echo $_SESSION['user_name'];?></span></p>
      <p class="">Today: <span class="text-success"><?php echo date("D, jS F Y");?></span></p>
    </div>
  </div> -->
</div>
<div class="row">
  <div class="col-md-4">
      <div class="card card-body bg-light mb-5">
        <h5 class="mb-3">Add Transaction</h5>
        
        <form action="<?php echo URLROOT; ?>/personal/add" method="post">
          <div class="form-group">
              <label>Select transaction type:</label>
              <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type">
                <option value="">---</option>
                <option value="expense">Expenses</option>
                <option value="income">Income</option>
              </select>
              <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
          </div>
          <div class="form-group">
              <label>Amount:</label>
              <input type="number" name="amount" class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['amount']; ?>" placeholder="">
              <span class="invalid-feedback"><?php echo $data['amount_err']; ?></span>
          </div>

          <div class="form-group">
              <label>Caption:</label>
              <textarea name="caption" class="form-control <?php echo (!empty($data['caption_err'])) ? 'is-invalid' : ''; ?>" placeholder="eg.. airtime recharge"><?php echo $data['caption']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['caption_err']; ?></span>
          </div>
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Add</button>
        </form>
      </div>
  </div>

  <div class="col-md-8">
    <div class="">
      <table class="table">
        <thead>
          <tr class="border">
            <th colspan="2"><span class="text-muted">History</span> | <span style="font-style: italic;font-size: 14px;"> current week(<?php echo date('W');?>)</span> | <span class="text-muted"> year 2024</span></th>
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
              <p style="font-size:13px;"><?php echo $post->amount ?></p>
            </td>
            <!-- Second Table data -->
            <td class="col-9" style="position: relative;">
              <!-- Caption div -->
              <div class=""><?php echo $post->caption ?></div>
              <!-- Transaction date div -->
              <div style="font-size:11px;position: absolute;top: 0;left: 0;">
                <p class=" badge bg-dark"><?php echo $post->day.' '. $post->d_num;?></p>
              </div>
              <!-- Delete icon div -->
              <div style="font-size:11px;position: absolute;top: 0;right: 0;">
                <form action="<?php echo URLROOT?>/personal/delete/<?= $post->id?>" method="post">
                  <button type="submit" style="padding:2px;margin: 2px;cursor: pointer;"><i class="fa fa-trash text-danger"></i></button>
                </form>
              </div><!-- Delete icon div ends-->
              <!-- Edit icon div -->
              <!-- <div style="font-size:11px;position: absolute;bottom: 0;right: 0;">
                <a href="<?php echo URLROOT?>/personal/edit/<?= $post->id?>" style="padding:2px;margin: 2px;">
                  <i class="fa fa-pencil"></i>
                </a>
              </div> --><!-- Edit icon div end -->
            </td><!-- Second Table data Ends -->
          </tr><!-- Second Table row ends -->
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
