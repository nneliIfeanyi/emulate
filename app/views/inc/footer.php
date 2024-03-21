
</div>
<?php if(isset($_SESSION['user_id'])):?>
<footer class="footer mt-4 text-bg-dark pt-4">
      <div class="container">
        <div class="row">
        	<div class="col-md-6">
            <h5 class="">Quick Links</h5>
            <ul class="list-unstyled">
              <li><a href="<?php echo URLROOT?>">Home</a></li>
              <li><a href="<?php echo URLROOT?>/personal/daily">Daily View</a></li>
              <li><a href="<?php echo URLROOT?>/personal/current_week">Weekly View</a></li>
              <li><a href="<?php echo URLROOT?>/personal/monthly">Monthly View</a></li>
              <li><a href="<?php echo URLROOT?>/pages/journal">Journal</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5 class="text-success"><?php echo SITENAME?></h5>
             <p style="font-size: 12px;font-style: italic;">
              Just remember, no matter how easy it is to spend your money, its not getting any easier to make that money.<span class="font-weight-bold"> Spending is Quick Earning is Slow</span>
            </p>
          </div>
          
        </div>
      </div>
      <div class="text-center border-top p-3">Copyright &copy; <?php echo date('Y');?><a class="badge"> Stanvic_Concepts</a></div>
    </footer>
  <?php endif;?>
  
</body>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/script.js"></script>
<script>
  // document.addEventListener('DOMContentLoaded', userScroll);
    const tooltip = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltip].map((tooltipTrigger) => new bootstrap.Tooltip(tooltipTrigger));
    //popover
    const popover = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popover].map((popoverTrigger) => new bootstrap.Popover(popoverTrigger));
</script>
</html>