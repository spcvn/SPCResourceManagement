<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->meta(['http-equiv'=>'X-UA-Compatible', 'content'=>'IE=edge,chrome=1'])?>
    <?= $this->Html->meta(['charset'=>'utf-8'])?>
    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->meta(['name'=>'description', 'content'=>'overview &amp; stats'])?>
    <?= $this->Html->meta(['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1.0, maximum-scale=1.0'])?>
    <!--[if !IE]> -->
    <?= $this->Html->script('jquery-2.1.4.min.js') ?>
    <?= $this->Html->script('jquery-1.12.4.js') ?>
    <?= $this->Html->script('jquery-ui.js') ?>
    <!-- <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&amp;subset=vietnamese" rel="stylesheet">
    <!-- bootstrap & fontawesome -->
    <?= $this->Html->css('bootstrap.min')?>
    <?= $this->Html->css('jquery-confirm.css')?>
    <?= $this->Html->css('/font-awesome/4.7.0/css/font-awesome.min.css')?>
    <?= $this->Html->css('jquery-ui.min.css')?>
    <?= $this->Html->css('jquery-ui.custom.min.css')?>
    <?= $this->Html->css('fileinput.css')?>
    <?= $this->Html->css('bootstrap-datetimepicker.min.css')?>

    <?= $this->Html->script('jquery.validate.min.js')?>

    <!-- page specific plugin styles -->
    <?= $this->Html->css('jquery-ui.custom.min.css')?>

    <!-- text fonts -->
    <?= $this->Html->css('fonts.googleapis.com.css')?>

    <!-- ace styles -->
    <?= $this->Html->css('ace.min.css',['class'=>'ace-main-stylesheet','id'=>'main-ace-style'])?>

    <!--[if lte IE 9]>
    <?= $this->Html->css('ace-part2.min.css',['class'=>'ace-main-stylesheet'])?>
    <![endif]-->
    <?= $this->Html->css('ace-skins.min.css')?>
    <?= $this->Html->css('ace-rtl.min.css')?>
    <?= $this->Html->css('rs-spc.css')?>

    <!--[if lte IE 9]>
    <?= $this->Html->css('ace-ie.min.css')?>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <?= $this->Html->script('ace-extra.min.js')?>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <?= $this->Html->script('html5shiv.min.js')?>
    <?= $this->Html->script('respond.min.js')?>
    <![endif]-->
    <script type="application/javascript">
        var baseUrl = "/";
    </script>
</head>
