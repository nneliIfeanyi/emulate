
</div>
<?php if(isset($_SESSION['user_id'])):?>
<footer class="mt-4 bg-light pt-5 pb-1">
      <div class="container">
        <div class="row">
        	<div class="col-md-6">
            <h3>Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="#">Home</a></li>
              <li><a href="#">Daily View</a></li>
              <li><a href="#">Weekly View</a></li>
              <li><a href="#">Monthly View</a></li>
              <li><a href="#">Journal</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5><?php echo SITENAME?></h5>
             <p>
              Just remember, no matter how easy it is to spend your money, its not getting any easier to make that money.<span class="font-weight-bold"> Spending is Quick Earning is Slow</span>
            </p>
          </div>
          
        </div>
      </div>
      <div class="text-center bg-dark text-light p-4">Copyright &copy; <?php echo date('Y');?><a href="#" class="badge"> Stanvic_Concepts</a></div>
    </footer>
  <?php endif;?>
  
</body>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
</html>