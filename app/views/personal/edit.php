<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
<div class="row">
  <div class="col-lg-7 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Edit Transaction</h2>
        <p>Change the details of this transaction</p>
        <form action="<?php echo URLROOT; ?>/personal/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
              <label>Select transaction type:</label>
              <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type">
                <option value="<?php echo $data['type'];?>"><?php echo $data['type'];?></option>
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
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Edit</button>
        </form>
      </div>
    </div>
  </div>
<!-- <?php require APPROOT . '/views/inc/footer.php'; ?> -->
