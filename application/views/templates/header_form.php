<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Style Sheet -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <title><?php echo isset($title)? $title : "邵阳市中心医院心胸外科" ?></title>
    </head>

    <body>
        <div alt="top photo">
            <img src="<?php echo base_url(); ?>assets/images/hospital.jpeg" class="w-100">
        </div>

        <ul class="nav nav-pills nav-justified bg-dark mb-3">
            <li class="nav-item">
                <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == '') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>">结节筛查</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'info') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>info">个人信息</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'consult') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>consult">咨询沟通</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->uri_string() == 'dynamics') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>dynamics">前沿动态</a>
            </li>
        </ul>
