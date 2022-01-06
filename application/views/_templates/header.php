<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="<?php echo $charset; ?>">
        <title><?php echo $title; ?></title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic">
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/font-awesome/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/ionicons/css/ionicons.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/adminlte/css/skins/skin-blue.min.css'); ?>">


        <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/domprojects/css/dp.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/pagination.css">

        <script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>

        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini sidebar-collapse">
    <div class="wrapper">
