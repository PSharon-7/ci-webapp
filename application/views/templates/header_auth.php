<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/bootstrap.min.css">
        <!-- Data Table -->
        <link rel="stylesheet" href="<?=base_url('assets')?>/css/datatables.min.css">
        <!-- Font Awesome -->
        <script>
            FontAwesomeConfig = { searchPseudoElements: true };
        </script>
        <script src="<?=base_url('assets')?>/components/font-awesome/js/all.min.js"></script>

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
            body {
                font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                color: #333;
                background-color: #fff;
            }

            table.dataTable.dtr-column > tbody > tr > td.control:before, table.dataTable.dtr-column > tbody > tr > th.control::before{
                display: none;
                font-family: "Font Awesome 5 Solid";
                content: "\f055"  
            }

            table.dataTable.dtr-column > tbody > tr.parent td.control::before, table.dataTable.dtr-column > tbody > tr.parent th.control::before {
                display: none;
                font-family: "Font Awesome 5 Solid";
                content: "\f056"
            }

            /* get rid of the :before elements */
            table.dataTable thead .sorting::before,
            table.dataTable thead .sorting_asc::before,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_asc_disabled::before,
            table.dataTable thead .sorting_desc_disabled::before {
                display: none;
            }

            /* sort both */
            table.dataTable thead .sorting::after {
                display: none;
                font-family: "Font Awesome 5 Solid";
                content: "\f0dc"
            }

            /* sort asc */
            table.dataTable thead .sorting_asc::after {
                display: none;
                font-family: "Font Awesome 5 Solid";
                content: "\f0de"
            }

            /* sort desc */
            table.dataTable thead .sorting_desc::after {
                display: none;
                font-family: "Font Awesome 5 Solid";
                content: "\f0dd"
            }

            /* Keeps the FA icons aligned correctly in the TH */
            th .svg-inline--fa {
                float: right;
                margin-right: -1.2em;
                margin-top: .25em;
            }

            .sorting_asc svg {
                color: black;
            }
            .sorting svg {
                color: lightgray;
            }
        </style>
    </head>

    <body>
        <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-light btn-sm" id="logout" href="<?php echo base_url(); ?>logout">登出</a>
        </div>
        <div alt="top photo">
            <img src="<?php echo base_url(); ?>assets/images/hospital.jpeg" class="w-100">
        </div>
        <ul class="nav nav-pills nav-justified bg-dark mb-3">
            <li class="nav-item">
                <a class="nav-link px-0 py-3 rounded-0 text-light <?php if($this->uri->segment(1) == 'pnscreening_doctor') { echo 'bg-light text-dark'; } ?>" href="<?php echo base_url(); ?>pnscreening_doctor">结节筛查</a>
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
