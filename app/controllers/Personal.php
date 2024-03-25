<?php
  class Personal extends Controller{
    public function __construct(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      // Load Models
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    // Load All Posts
    public function index(){
      $posts = $this->postModel->getCurrentWeek_LM7();
      $expense = $this->postModel->getCurrentWeekExpense();
      $income = $this->postModel->getCurrentWeekIncome();
      $investment = $this->postModel->getCurrentWeekInvestment();
      $savings = $this->postModel->getCurrentWeekSavings();
      $charity = $this->postModel->getCurrentWeekCharity();

      $data = [
        'posts' => $posts,
        'expense' => $expense,
        'income' => $income,
        'investment' => $investment,
        'savings' => $savings,
        'charity' => $charity,
        'amount' => '',
        'caption' => ''
      ];
      
      $this->view('personal/index', $data);
    }

    // Show All Daily Post Transaction
    public function show(){
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ];

      $this->view('personal/show', $data);
    }

    // Add Post
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // $posts = $this->postModel->getCurrentWeek_7();
        // $expense = $this->postModel->getCurrentWeekExpense();
        // $income = $this->postModel->getCurrentWeekIncome();
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          // 'posts' => $posts,
          // 'expense' => $expense,
          // 'income' => $income,
          'amount' => trim($_POST['amount']),
          'caption' => trim($_POST['caption']),
          'user_id' => $_SESSION['user_id'],
          'type' => $_POST['type'],
          'year' => date('Y'),
          'month' => date('M'),
          'day' => date('D'),
          'd_num' => date('jS'),
          'week' => date('W'),
          'amount_err' => '',
          'caption_err' => '',
          'type_err' => ''
        ];

         // Validate 
        if(empty($data['type'])){
            // $data['type_err'] = 'Please select transaction type';
            // $this->view('personal/index', $data);
          flash('msg', 'All fields are required..', 'alert alert-danger');
          echo "
          <script type='text/javascript'>
            window.location = window.location.href;
          </script>
          ";
        }elseif(empty($data['amount'])){
            // $data['amount_err'] = 'Please enter amount';
            // $this->view('personal/index', $data);
            flash('msg', 'All fields are required..', 'alert alert-danger');
          echo "
          <script type='text/javascript'>
            window.location = window.location.href;
          </script>
          ";
        }elseif(empty($data['caption'])){
          flash('msg', 'All fields are required..', 'alert alert-danger');
          echo "
          <script type='text/javascript'>
            window.location = window.location.href;
          </script>
          ";
        }elseif($data['type'] == 'expense') {
            $this->postModel->addPost($data);
            flash('msg', 'Transaction Added', 'alert alert-danger');
            redirect('personal');
        }else {
            $this->postModel->addPost($data);
            flash('msg', 'Transaction Added');
            redirect('personal');
 
        }
        // else{
        //     die('Something went wrong');  
        // }
        

      }//Post request method ends..
       else {
        // $posts = $this->postModel->getCurrentWeek_7();
        // $expense = $this->postModel->getCurrentWeekExpense();
        // $income = $this->postModel->getCurrentWeekIncome();

        $data = [
          // 'posts' => $posts,
          // 'expense' => $expense,
          // 'income' => $income,
          'amount' => '',
          'caption' => ''
        ];
      
      $this->view('personal/add', $data);
      }
    }//Add post function ends..

    // Edit Post post function begins
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(empty($_POST['caption'])){
          $caption = $_POST['type'];
        }else{
          $caption = $_POST['caption'];
        }
        
        $data = [
          'id' => $id,
          'amount' => trim($_POST['amount']),
          'caption' => $caption,
          'user_id' => $_SESSION['user_id'],
          'type' => $_POST['type'],
          'date' => $_POST['date'],
          'day' => $_POST['day2'],   
          'amount_err' => '',
          'caption_err' => '',
          'type_err' => ''
        ];
      
        $this->postModel->updatePost($data);
        flash('msg','Edit Successfull');
        redirect('personal');
        
      } else {
        // Get post from model
        $post = $this->postModel->getPostById($id);
        $date = $this->postModel->getDistinctDate();
        $day = $this->postModel->getDistinctDay();

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('personal');
        }

        $data = [
          'id' => $id,
          'amount' => $post->amount,
          'caption' => $post->caption,
          'type' => $post->type,
          'day' => $post->day,
          'd_num' => $post->d_num,
          'day2' => $day,
          'week' => $post->week,
          'date' => $date,
          'amount_err' => '',
          'caption_err' => '',
          'type_err' => ''
        ];

        $this->view('personal/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->postModel->deletePost($id)){
          // Redirect to login
          flash('msg', 'Transaction Removed','alert alert-danger');
          redirect('personal');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('personal');
      }
    }



    // Load Weekly Posts
    public function daily(){
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $date = $_POST['date'];
        $month = $_POST['month'];
        $id = $_SESSION['user_id'];
        $year = $_POST['year'];
        $income = 'income';
        $expense = 'expense';
        $investment = 'investment';
        $savings = 'savings';
        $charity = 'charity';
        if (empty($date)) {
          flash('msg', 'Date is required..', 'alert alert-danger');
          echo "
          <script type='text/javascript'>
            window.location = window.location.href;
          </script>
          ";
        }else{

        $posts = $this->postModel->getSpecificDate($id, $date, $month, $year);
        $expense = $this->postModel->getExpenseDate($id, $date, $month, $year, $expense);
        $income = $this->postModel->getIncomeDate($id, $date, $month, $year, $income);
        $investment = $this->postModel->getInvestmentDate($id, $date, $month, $year, $investment);
        $savings = $this->postModel->getSavingsDate($id, $date, $month, $year, $savings);
        $charity = $this->postModel->getCharityDate($id, $date, $month, $year, $charity);

        $data = [
          'posts' => $posts,
          'income' => $income,
          'expense' => $expense,
          'investment' => $investment,
          'savings' => $savings,
          'charity' => $charity,
          'date' => $date,
          'month' => $month,
          'year' => $year
        ];

      $this->view('inc/daily', $data);
      }
     }else{
      $date = $this->postModel->getDistinctDate();
      $month = $this->postModel->getDistinctMonth();
      $year = $this->postModel->getDistinctYear();
      $posts = $this->postModel->getPostsAll();
      $expense = $this->postModel->getExpense();
      $income = $this->postModel->getIncome();
      $investment = $this->postModel->getInvestment();
      $savings = $this->postModel->getSavings();
      $charity = $this->postModel->getCharity();

      $data = [
        'date' => $date,
        'year' => $year,
        'month' => $month,
        'posts' => $posts,
        'expense' => $expense,
        'income' => $income,
        'investment' => $investment,
        'savings' => $savings,
        'charity' => $charity
      ];
      
      $this->view('personal/daily', $data);
     }
    }


    // Load current week
    public function current_week(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $week = $_POST['week'];
        $id = $_SESSION['user_id'];
        $year = $_POST['year'];
        $income = 'income';
        $expense = 'expense';
        if (empty($week)) {
          flash('msg', 'All fields are required..', 'alert alert-danger');
          echo "
          <script type='text/javascript'>
            window.location = window.location.href;
          </script>
          ";
        }else{

        $posts = $this->postModel->getSpecificWeek($id, $week, $year);
        $expense = $this->postModel->getExpenseWeek($id, $week, $year, $expense);
        $income = $this->postModel->getIncomeWeek($id, $week, $year, $income);

        $data = [
          'posts' => $posts,
          'income' => $income,
          'expense' => $expense,
          'week' => $week,
          'year' => $year
        ];

      $this->view('inc/week', $data);
      }
      }else{
        $posts = $this->postModel->getCurrentWeek();
        $expense = $this->postModel->getCurrentWeekExpense();
        $income = $this->postModel->getCurrentWeekIncome();

        $week = $this->postModel->getDistinctWeek();
        $year = $this->postModel->getDistinctYear();

        $data = [
          'posts' => $posts,
          'expense' => $expense,
          'income' => $income,
          'week' => $week,
          'year' => $year
        ];
        
        $this->view('personal/current_week', $data);
      }
    }

     // Load current week
    public function monthly(){
      // $posts = $this->postModel->getCurrentWeek();
      // $expense = $this->postModel->getCurrentWeekExpense();
      // $income = $this->postModel->getCurrentWeekIncome();

      $data = [
        // 'posts' => $posts,
        // 'expense' => $expense,
        // 'income' => $income
      ];
      
      $this->view('personal/monthly', $data);
    }


    
  }