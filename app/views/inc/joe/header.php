<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">

  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styles.css" />
  <title>Stanvic Concepts | Journal</title>
  <style type="text/css">
    .flash-msg{
      position: fixed;
      top: 12vh;
      right: 50vw;
      z-index: 5;
      animation-name: fade;
      animation-duration: 3s;
      animation-delay: 6s;
      animation-iteration-count: 1;
      animation-fill-mode: forwards;
    }

    @keyframes fade{
      from{opacity: 1;}
      to{opacity: 0;}
    }
  </style>
</head>
<body style="position: relative;">
  <?php require APPROOT . '/views/inc/joe/navbar.php'; ?>
  <div class="container">
  