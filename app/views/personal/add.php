<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-3">
        <h5 class="mb-3">Add Transaction</h5>
        <?php flash('msg');?>
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
<div class="row my-3"><div class="text-center col-lg-6 shadow-sm py-2 rounded-2">
  <a style="cursor: pointer;" onclick="history.back()"><i class="fa fa-backward"></i> Back</a>
</div>
<div class="text-center col-lg-6 shadow-sm py-2 rounded-2">
  <a href="<?php echo URLROOT?>/personal/daily"><i class="fa fa-eye"></i> View Today</a>
</div></div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
