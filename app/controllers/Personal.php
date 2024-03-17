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
      $posts = $this->postModel->getPosts();
      $expense = $this->postModel->getExpense();
      $income = $this->postModel->getIncome();

      $data = [
        'posts' => $posts,
        'expense' => $expense,
        'income' => $income,
        'amount' => '',
        'caption' => ''
      ];
      
      $this->view('personal/index', $data);
    }

    // Show Single Post
    public function show($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post, 
        'user' => $user
      ];

      $this->view('personal/show', $data);
    }

    // Add Post
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $posts = $this->postModel->getPosts();
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'posts' => $posts,
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
            $data['type_err'] = 'Please select transaction type';
            $this->view('personal/index', $data);
        }elseif(empty($data['amount'])){
            $data['amount_err'] = 'Please enter amount';
            $this->view('personal/index', $data);
        }elseif(empty($data['caption'])){
            $data['caption_err'] = 'Briefly describe transaction';
            $this->view('personal/index', $data);
        }elseif($data['type'] == 'expense') {
            $this->postModel->addPost($data);
            flash('msg', 'Transaction Added', 'alert alert-danger');
            redirect('personal');
        }elseif($data['type'] == 'income') {
            $this->postModel->addPost($data);
            flash('msg', 'Transaction Added');
            redirect('personal');

        }else{
            die('Something went wrong');  
        }
        

      }//Post request method ends..
       else {
        redirect('personal');
      }
    }//Add post function ends..

    // Edit Post post function begins
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],   
          'title_err' => '',
          'body_err' => ''
        ];

         // Validate email
         if(empty($data['title'])){
          $data['title_err'] = 'Please enter name';
          // Validate name
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
        }

        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validation passed
          //Execute
          if($this->postModel->updatePost($data)){
          // Redirect to login
          flash('post_message', 'Post Updated');
          redirect('personal');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('personal/edit', $data);
        }

      } else {
        // Get post from model
        $post = $this->postModel->getPostById($id);

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('personal');
        }

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body,
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




    
  }