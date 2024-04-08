<?php
session_start();

// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success'){
  if(!empty($name)){
    //No message, create it
    if(!empty($message) && empty($_SESSION[$name])){
      if(!empty( $_SESSION[$name])){
          unset( $_SESSION[$name]);
      }
      if(!empty( $_SESSION[$name.'_class'])){
          unset( $_SESSION[$name.'_class']);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name.'_class'] = $class;
    }
    //Message exists, display it
    elseif(!empty($_SESSION[$name]) && empty($message)){
      $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'success';
      echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
      unset($_SESSION[$name]);
      unset($_SESSION[$name.'_class']);
    }
  }
}


// PHP program to convert timestamp 
// to time ago 

  

function to_time_ago( $time ) { 

      

    // Calculate difference between current 

    // time and given timestamp in seconds 

    $diff = time() - $time; 

      

    if( $diff < 1 ) {  

        return 'less than 1 second ago';  

    } 

      

    $time_rules = array (  

                12 * 30 * 24 * 60 * 60 => 'year', 

                30 * 24 * 60 * 60       => 'month', 

                24 * 60 * 60           => 'day', 

                60 * 60                   => 'hour', 

                60                       => 'minute', 

                1                       => 'second'

    ); 

  

    foreach( $time_rules as $secs => $str ) { 

          

        $div = $diff / $secs; 

  

        if( $div >= 1 ) { 

              

              

            $t = round( $div ); 

              

            return $t . ' ' . $str .  

                ( $t > 1 ? 's' : '' ) . ' ago'; 

        } 

    } 
} 

  
//to_time_ago() function call 

//echo to_time_ago( time() - 5);