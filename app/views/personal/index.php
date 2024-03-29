<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-6">
    <?php if(!empty(flash('msg'))) :?>
      <p class="font-weight-light">
      <?php flash('msg');?>
      </p>
    <?php endif;?>
  </div>
  <div class="col-6" style="overflow: hidden;">

    <p class="float-end pe-1 mb-3">
      <i class="fa fa-user"></i>&nbsp;
      <?php echo $_SESSION['user_name'];?>
    </p>
  </div>
</div>
<div class="row text-center">
  <div class="col-md-6">
    <div class="row">
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-primary rounded-2">
          <h1 class="h6">Your Balance:</h1>
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
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-dark rounded-2">
          <h1 class="h6 text-muted">Tenth:</h1>
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
  <div class="col-md-6">
    <div class="row">
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-success rounded-2">
          <h1 class="h6 text-muted">Income:</h1>
          <p class="font-weight-light">
            <?php if(empty($data['income'])):?>
            &#8358;0.00
            <?php else:?>
            &#8358;<?= put_coma($data['income'])?>.00
            <?php endif;?>
          </p>
        </div>
      </div>
      <div class="col-6">
        <div class="shadow-lg ps-2 pt-2 border-end border-5 border-danger rounded-2">
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
  </div>
  
</div>
<div class="row">
  <div class="col-md-8">
    <div class="mt-5">
      <?php if(!empty($data['posts'])):?>
      <table class="table">
        <thead>
          <tr class="border text-center">
            <th colspan="2"><span class="">Transaction History</span></th>
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
      <div class="text-center mt-2 mb-4">
        <a href="<?php echo URLROOT?>/personal/show" class="btn"><i class="fa fa-eye"></i> Veiw all transactions</a>
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

  <div class="col-md-4">
      <div class="card card-body bg-light mt-5 mb-5">
        <h5 class="mb-3 text-center">Add Transaction</h5>
        
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
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Add</button>
        </form>
      </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
