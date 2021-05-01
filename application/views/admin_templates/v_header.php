<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?= base_url('assets/');?>img/logo/Logo GKS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $title; ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?= base_url('assets/');?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/');?>css/animate.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/preview_image.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/cursor.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />


    <!--     Fonts and icons     -->
    <script src="https://kit.fontawesome.com/5e59a4bfec.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/');?>css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        .preview {
          overflow: hidden;
          width: 160px; 
          height: 160px;
          margin: 10px;
          border: 1px solid red;
        }
        .modal-lg{
          max-width: 1000px !important;
        }
    </style>
</head>
<body>