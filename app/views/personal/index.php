<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row shadow">
  <div class="col-md-5">
    <h1 class="h5 text-muted">Your Balance:</h1>
    <p class="font-weight-bold">
     <?php if(empty($data['expense']) AND empty($data['income'])):?>
     &#8358;0.00
     <?php else:?>
     &#8358;<?= put_coma($data['income'] - $data['expense'])?>.00
     <?php endif;?>
    </p>
  </div>
  <div class="col-md-7">
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
    <h6><?php echo flash('msg');?></h6>
    <div class="">
      <h5>History</h5>
      <table class="table">
        <tbody>
          <?php foreach($data['posts'] as $post) : 

            if ($post->type == 'expense') {
              $post->amount = "<span class='text-danger font-weight-bold'>"."-&#8358;".put_coma($post->amount)."</span>";
            }else{
              $post->amount = "<span class='text-success font-weight-bold'>"."+&#8358;".put_coma($post->amount)."</span>";
            }

          ?>
          <tr class="row">
            <td class="col-3"><p style="font-size:13px;"><?php echo $post->amount ?></p></td>
            <td class="col-7"><?php echo $post->caption ?></td>
            <td class="col-2"><p class=" badge bg-dark"><?php echo $post->day.' '. $post->d_num;?></p></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
