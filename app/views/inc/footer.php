
</div>
<?php if(isset($_SESSION['user_id'])):?>
<footer class="mt-4 bg-dark text-light pt-5 pb-1">
      <div class="container">
        <div class="row">
        	<div class="col-md-6">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a>Home</a></li>
              <li><a>Daily View</a></li>
              <li><a>Weekly View</a></li>
              <li><a>Monthly View</a></li>
              <li><a>Journal</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5><?php echo SITENAME?></h5>
             <p style="font-size: 12px;font-style: italic;">
              Just remember, no matter how easy it is to spend your money, its not getting any easier to make that money.<span class="font-weight-bold"> Spending is Quick Earning is Slow</span>
            </p>
          </div>
          
        </div>
      </div>
      <div class="text-center border p-4">Copyright &copy; <?php echo date('Y');?><a class="badge"> Stanvic_Concepts</a></div>
    </footer>
  <?php endif;?>
  
</body>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
</html>