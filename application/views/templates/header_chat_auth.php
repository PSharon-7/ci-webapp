<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url('assets')?>/components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/_all-skins.min.css">
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/chat.css">
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/timeline.css">

        <title><?php echo isset($title)? $title : "邵阳市中心医院心胸外科" ?></title>
        <style>
            #logout {
                position: absolute;
                top: 0;
                right: 0;
            }
            .nav-pills .show>.nav-link{
                background-color: #282d31;
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div id="top_header">
            <div class="d-flex justify-content-end">
                <a type="button" class="btn btn-light btn-sm" id="logout" href="<?php echo base_url(); ?>logout">登出</a>
            </div>
            <div alt="top photo">
                <img src="<?php echo base_url(); ?>assets/images/hospital.jpeg" class="w-100">
            </div>
            <ul class="nav nav-pills nav-justified bg-dark">
                <li class="nav-item">
                    <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'pnscreening_doctor') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>pnscreening_doctor">结节筛查</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'patientmanager') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>patientmanager" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">患者管理</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>patientmanager">病人管理</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>patientmanager">数据分析</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'consulting_doctor') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>consulting_doctor">咨询沟通</a>
                </li>
            </ul>
        </div>
        
        <div class="wrapper">
