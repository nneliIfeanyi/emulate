
</div>
<?php if(isset($_SESSION['user_id'])):?>
<footer class="footer mt-4 text-bg-dark pt-4">
      <div class="container">
        <div class="row">
        	<div class="col-md-6">
            <h5 class="">Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="<?php echo URLROOT?>">Home</a></li>
              <li><a href="<?php echo URLROOT?>/personal/add">Add Transaction</a></li>
              <li><a href="<?php echo URLROOT?>/personal/daily">Daily View</a></li>
              <li><a href="<?php echo URLROOT?>/personal/current_week">Weekly View</a></li>
              <li><a href="<?php echo URLROOT?>/personal/monthly">Monthly View</a></li>
              <li><a href="<?php echo URLROOT?>/pages/journal">Journal</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5 class="">Spending is Quick Earning is Slow</h5>
             <p class="lead text-primary fs-5">
              Just remember, no matter how easy it is to spend your money, its not getting any easier to make that money.
            </p>
          </div>
          
        </div>
      </div>
      <div class="text-center border-top p-3">Copyright &copy; <?php echo date('Y');?><a class="badge"> Stanvic_Concepts</a></div>
    </footer>
  <?php endif;?>
  
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.colVis.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
<script>
  // document.addEventListener('DOMContentLoaded', userScroll);
     const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
<script>
    $('#register_form').parsley();
    $('#register_form').on('submit', function(event){
        event.preventDefault();

        if($('#register_form').parsley().isValid()){
            let formData = $(this).serialize();
            $.ajax({
                url: "<?php echo URLROOT;?>/alumni/register",
                method: "POST",
                data: formData,
    
                beforeSend: function () {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('Processing Submission, pls wait ......');

                },
                success:function (response) {
                    $('#register_form').parsley().reset();
                    $('#submit').attr('disabled', false);
                    $('#submit').val('Submit');
                    $('#msg').html(response);
                }
            })
        }

    })
</script>
</html>