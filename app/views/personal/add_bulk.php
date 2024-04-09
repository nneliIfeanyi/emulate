<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="flash-msg">
  <?php echo flash('msg')?>
</div>
<?php if (empty($data['posts'])): ?>
  <form action="<?php echo URLROOT; ?>/personal/add_bulk" method="post">
    <div class="table-responsive">
<table class="table table-striped border">
  <thead>
    <tr class="border text-center">
      <td>#</td>
      <th>Transaction Type</th>
      <!-- <th>Category</th> -->
      <th>Transaction Amount</th>
      <th>Transaction Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="30px">1</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">2</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">3</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">4</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">5</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">6</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">7</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">8</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">9</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">10</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">11</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
    <tr>
      <td width="30px">12</td>
      <td>
        <select class="form-control" name="type[]">
          <option value="">---</option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?php // echo $data['amount']; ?>" placeholder="">
      </td>
      <!-- <td></td> -->
      <td>
        <input name="caption[]" class="form-control" type="text" value="">
        </textarea>
      </td>
    </tr>
  </tbody>
</table>
</div>
<button type="submit" class="btn btn-success mt-2">Add Multiple Transactions</button>
</form>

<!-- ///////////
      ============
                  -->

<?php elseif($data['added_rows'] <= 12) :?>

  <!-- ///////////
      ============
                  -->
<p class="h3">Add More Transaction</p>
<form action="<?php echo URLROOT; ?>/personal/add_more" method="post">
  <div style="overflow-x: scroll;">
<table class="table table-striped border w-100">
  <thead>
    <tr class="border text-center">
      <th>Transaction type</th>
      <th>Transaction Amount</th>
      <th>Transaction Description</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($data['posts'] as $added): 

    ?>
    <tr>
      <td>
        <input type="hidden" name="id[]" value="<?= $added->id;?>">
        <select class="form-control" name="type[]">
          <option value="<?= $added->type?>"><?= $added->type;?></option>
          <option value="expense">Expenses</option>
          <option value="income">Income</option>
        </select>
      </td>
      <td>
        <input type="number" name="amount[]" class="form-control" value="<?= $added->amount;?>">
      </td>
      <td>
        <input name="caption[]" class="form-control" type="text" value="<?= $added->caption;?>">
        </textarea>
      </td>
    </tr>
  <?php $i++; endforeach;?>
  </tbody>
</table>
</div>
<div class="row mt-2">
  <div class="col-md-6">
    <button type="submit" class="btn btn-success">Add bulk</button>
  </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT?>/personal/add" class="btn">Add Single <i class="fa fa-angle-right"></i></a>
    </div>
  </div>
</div>

</form>
<?php endif ?>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<!-- <script>
  new DataTable('#example', {
    ordering:false,
    info:false,
    paging:false,
    searching:false,
});
</script> -->

<!--<?php // elseif($data['added_rows'] == 12) :
  // flash('msg', 'You have used up available space for recording multiple transaction at a time.');
  // redirect('personal/add');
?>-->
