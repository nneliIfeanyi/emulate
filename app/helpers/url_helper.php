<?php
  // Simple page redirect
  function redirect($page){
    header('location: '.URLROOT.'/'.$page);
  }


  function put_coma($amount){

    if (strlen($amount) == 6 ) {

      $arr = str_split($amount,3);
      $amount = $arr[0].','.$arr[1];

    }elseif (strlen($amount) == 5 ) {
      
      $arr = str_split($amount,2);
      $amount = $arr[0].','.$arr[1].$arr[2];

    }elseif (strlen($amount) == 4 ) {
      
      $arr = str_split($amount,1);
      $amount = $arr[0].','.$arr[1].$arr[2].$arr[3];
    }else{
      $amount = $amount;
    }
    return $amount;
  }


  function tithe($income){
    $calc = $income/100*10;
    echo $calc;
  }