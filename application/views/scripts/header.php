<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title><?php echo $this->title; ?></title>
    <meta name="keywords" content="<?php echo $this->keywords ?>">
    <meta name="description" content="<?php echo $this->description ?>">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="<?php echo $this->imgUrl; ?>favicon.ico">
    <link href="<?php echo $this->baseUrl; ?>css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->baseUrl; ?>css/base.css">
    <?php
    if ($this->header) {
        echo $this->header;
    }
    ?>
    <!--[if lte IE 8]>
	    <link rel="stylesheet" href="<?php echo $this->baseUrl; ?>css/iehack.css">
	<![endif]-->
    <script src="<?php echo $this->baseUrl; ?>js/respond.js"></script>
</head>

<body>