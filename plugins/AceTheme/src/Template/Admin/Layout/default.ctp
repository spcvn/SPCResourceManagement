<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('../assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css') ?>
    <?= $this->Html->css('../assets/libs/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('../assets/libs/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('../assets/libs/fontello/css/fontello.css') ?>
    <?= $this->Html->css('../assets/libs/animate-css/animate.min.css') ?>
    <?= $this->Html->css('../assets/libs/nifty-modal/css/component.css') ?>
    <?= $this->Html->css('../assets/libs/magnific-popup/magnific-popup.css') ?>
    <?= $this->Html->css('../assets/libs/ios7-switch/ios7-switch.css') ?>
    <?= $this->Html->css('../assets/libs/pace/pace.css') ?>
    <?= $this->Html->css('../assets/libs/sortable/sortable-theme-bootstrap.css') ?>
    <?= $this->Html->css('../assets/libs/bootstrap-datepicker/css/datepicker.css') ?>
    <?= $this->Html->css('../assets/libs/jquery-icheck/skins/all.css') ?>
    <!-- Code Highlighter for Demo -->
    <?= $this->Html->css('../assets/libs/jquery-icheck/skins/all.css') ?>
    <!-- Extra CSS Libraries Start -->
    <?= $this->Html->css('../assets/libs/css/style.css') ?>

    <!-- Extra CSS Libraries End -->
    <?= $this->Html->css('../assets/libs/css/style-responsive.css') ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

<!--  <link rel="shortcut icon" href="assets/img/favicon.ico">-->
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />





    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- Modal Task Progress -->

<?php
$this->extend('/Admin/Layout/task_progress');
?>
<!--Modal Logout-->
<?php
$this->extend('/Admin/Layout/logout');
?>
    <!-- Begin page -->
    <div id="wrapper">
        <?php
        $this->extend('/Admin/Layout/topbar');
        $this->extend('/Admin/Layout/left_sidebar');
        $this->extend('/Admin/Layout/right_sidebar');
        $this->extend('/Admin/Layout/content');
        ?>
    </div>
    <!-- End of page -->
    <!-- the overlay modal element -->
    <div class="md-overlay"></div>
    <!-- End of eoverlay modal -->

    <script>
    		var resizefunc = [];
    </script>
    <?= $this->Html->script('../assets/libs/jquery/jquery-1.11.1.min.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('../assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-detectmobile/detect.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-animate-numbers/jquery.animateNumbers.js') ?>
    <?= $this->Html->script('../assets/libs/ios7-switch/ios7.switch.js') ?>
    <?= $this->Html->script('../assets/libs/fastclick/fastclick.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-blockui/jquery.blockUI.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap-bootbox/bootbox.min.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-slimscroll/jquery.slimscroll.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-sparkline/jquery-sparkline.js') ?>
    <?= $this->Html->script('../assets/libs/nifty-modal/js/classie.js') ?>
    <?= $this->Html->script('../assets/libs/nifty-modal/js/modalEffects.js') ?>
    <?= $this->Html->script('../assets/libs/sortable/sortable.min.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap-fileinput/bootstrap.file-input.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap-select/bootstrap-select.min.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap-select2/select2.min.js') ?>
    <?= $this->Html->script('../assets/libs/magnific-popup/jquery.magnific-popup.min.js') ?>
    <?= $this->Html->script('../assets/libs/pace/pace.min.js') ?>
    <?= $this->Html->script('../assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>
    <?= $this->Html->script('../assets/libs/jquery-icheck/icheck.min.js') ?>
    <!-- Demo Specific JS Libraries -->
    <?= $this->Html->script('../assets/libs/prettify/prettify.js') ?>
    <?= $this->Html->script('../assets/js/init.js') ?>
</body>
</html>
