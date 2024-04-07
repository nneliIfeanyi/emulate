<?php
  class Pages extends Controller{
    private $userModel;
    private $postModel;
    public function __construct(){
     $this->postModel = $this->model('Post');
    }

    // Load Homepage
    public function index(){
      // If logged in, redirect to posts
      if(isset($_SESSION['user_id'])){
        redirect('personal');
      }

      //Set Data
      $data = [
        'title' => 'Expense Tracker',
        'description' => 'Monitor your daily, weekly and monthly expenditure with ease.'
      ];

      // Load homepage/index view
      $this->view('pages/index', $data);
    }

    public function journal(){
      $data = [

      ];
        
      $this->view('pages/journal', $data);
    }


    public function download(){
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
      $this->view('pages/download', $data);
    }

    public function download_month(){
        $posts = $this->postModel->getCurrentMonth();
        $expense = $this->postModel->getCurrentMonthExpense();
        $income = $this->postModel->getCurrentMonthIncome();

        // $week = $this->postModel->getDistinctWeek();
        // $year = $this->postModel->getDistinctYear();

        $data = [
          'posts' => $posts,
          'expense' => $expense,
          'income' => $income,
          // 'week' => $week,
          // 'year' => $year
        ];
      $this->view('pages/download_month', $data);
    }



  }