<?php
  class Pages extends Controller{
    public function __construct(){
     
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
      //Set Data
      $data = [
        'version' => '1.0.0'
      ];

      // Load about view
      $this->view('pages/journal', $data);
    }
  }