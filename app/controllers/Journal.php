<?php
  class Journal extends Controller{
    public function __construct(){
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
      }
      // Load Models
      $this->joeModel = $this->model('Journals');
      $this->userModel = $this->model('User');
    }

    // Load All Posts
    public function index(){
      $posts = $this->joeModel->getPosts();

      $data = [
        'posts' => $posts
      ];
      
      $this->view('journal/index', $data);
    }

    // Show Single Post
    public function show($id){
      $post = $this->joeModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post, 
        'user' => $user
      ];

      $this->view('journal/show', $data);
    }

    // Add Post
    public function add(){
      $year = date('Y');
      $month =date('M');
      $day = date('D');
      $date = date('jS');
      $week = date('W');
      $time = date('h:ia');
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'], 
          'week' => $week,
          'year' => $year,
          'month' =>$month,
          'date_' => $day.' '.$date,
          'created_time' => $time, 
          'title_err' => '',
          'body_err' => ''
        ];

         // Validate email
         if(empty($data['title'])){
          $data['title_err'] = 'Please select your mood';
          // Validate name
          if(empty($data['body'])){
            $data['body_err'] = 'Please enter the post body';
          }
        }

        // Make sure there are no errors
        if(empty($data['title_err']) && empty($data['body_err'])){
          // Validation passed
          //Execute
          if($this->joeModel->addPost($data)){
            // Redirect to login
            flash('msg', 'Journal Post Added Successfully');
            redirect('journal');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('journal/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'body' => '',
        ];

        $this->view('journal/add', $data);
      }
    }

    // Edit Post
    public function edit($id){
      $year = date('Y');
      $month =date('M');
      $day = date('D');
      $date = date('jS');
      $week = date('W');
      $time = date('h:ia');
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'], 
          'created_on' => $day.' '.$date.' '.$month.' '.$year, 
          'edit_time' => $time, 
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
          if($this->joeModel->updatePost($data)){
          // Redirect to login
          flash('msg', 'Journal Successfully Updated ');
          echo "
              <script>
                history.go(-2);
              </script>
          ";
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('journal/edit', $data);
        }

      } else {
        // Get post from model
        $post = $this->joeModel->getPostById($id);

        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('journal');
        }

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body,
        ];

        $this->view('journal/edit', $data);
      }
    }

    // Delete Post
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->joeModel->deletePost($id)){
          // Redirect to login
          flash('msg', 'Journal Successfully Removed', 'alert alert-danger');
          echo "
              <script>
                history.go(-2);
              </script>
          ";
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('journal');
      }
    }
  }