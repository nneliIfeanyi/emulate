<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-lg-7 mx-auto">
      <div class="card card-body bg-light my-5">
        <h2>Edit Transaction</h2>
          <?php if(!empty(flash('msg'))) :?>
            <p class="font-weight-light">
            <?php flash('msg');?>
            </p>
          <?php endif;?>
        <p data-bs-toggle="tooltip" data-bs-title="Hello there">Change the details of this transaction</p>
        <form action="<?php echo URLROOT; ?>/personal/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group mb-3">
              <label>Select transaction type:</label>
              <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type">
                <option value="<?php echo $data['type'];?>"><?php echo $data['type'];?></option>
                <option value="expense">Expenses</option>
                <option value="income">Income</option>
              </select>
              <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
          </div>
          <div class="form-group mb-3">
              <label>Amount:</label>
              <input type="number" name="amount" class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['amount']; ?>" placeholder="">
              <span class="invalid-feedback"><?php echo $data['amount_err']; ?></span>
          </div>

          <div class="form-group mb-3">
              <label>Caption:</label>
              <textarea name="caption" class="form-control <?php echo (!empty($data['caption_err'])) ? 'is-invalid' : ''; ?>" placeholder="eg.. airtime recharge"><?php echo $data['caption']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['caption_err']; ?></span>
          </div>
          
            <div class="row">
               <div class="col-6 col-lg-3 mb-3 form-group">
                <label>Day: </label>
                
                <select class="form-control" name="day2">
                  <option value="<?php echo $data['day']; ?>"><?php echo $data['day']; ?></option>
                  <?php foreach($data['day2'] as $day2):?>
                  <option value="<?php echo $day2->day?>"><?php echo $day2->day?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="col-6 col-lg-3 mb-3 form-group">
                <label>Date: </label>
                
                <select class="form-control" name="date">
                  <option value="<?php echo $data['d_num']; ?>"><?php echo $data['d_num']; ?></option>
                  <?php foreach($data['date'] as $date):?>
                  <option value="<?php echo $date->d_num?>"><?php echo $date->d_num?></option>
                  <?php endforeach;?>
                </select>
              </div>

              <div class="col-6 col-lg-3 mb-3 form-group">
                <label>Date: </label>
                
                <select class="form-control" name="week2">
                  <option value="<?php echo $data['week']; ?>"><?php echo $data['week']; ?></option>
                  <?php foreach($data['week2'] as $date):?>
                  <option value="<?php echo $date->week?>"><?php echo $date->week?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          
          <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Edit</button>
          <a onclick="history.back()" class="btn btn-light float-end"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
        </form>
      </div>
    </div>
  </div>
<!-- <?php require APPROOT . '/views/inc/footer.php'; ?> -->
