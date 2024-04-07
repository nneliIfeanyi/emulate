<?php require APPROOT . '/views/inc/header.php'; ?>

<!--Delete post Modal -->
  <div class="row">
    <div class="col-md-6 mx-auto mt-5">
      <div class="card">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash text-danger"></i> This Action cannot be reveresed..</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
        <div class="card-body">
          This Action cannot be reveresed..
          <p class="lead">Do you wish to Continue?</p>
        </div>
        <div class="card-footer p-2 d-flex justify-content-around">
          <button type="button" class="btn btn-secondary" onclick="history.back()">
            <i class="fas fa-times"></i> Cancel
          </button>
          <form action="<?php echo URLROOT; ?>/personal/delete/<?php echo $id; ?>" method="post">
            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Yes, Continue</button>
          </form>
        </div>
      </div>
    </div>
  </div>