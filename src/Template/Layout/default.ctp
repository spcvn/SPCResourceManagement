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

$cakeDescription = 'SPCVN';
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

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('jquery.modal') ?>
    <?= $this->Html->css('jquery.datetimepicker.min') ?>
    <?= $this->Html->css('awesome/css/font-awesome.min.css') ?>
    
    <?= $this->Html->script('jquery-3.1.1.min.js') ?>   
    <?= $this->Html->script('ckeditor/ckeditor.js') ?>
    <?= $this->Html->script('jquery.modal.min') ?>
    <?= $this->Html->script('jquery.datetimepicker.full.min') ?>
 
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="/">HOME</a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if (is_array($is_login)): ?>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?> </li>
                <?php endif; ?>
                
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
<script type="text/javascript">
    var baseUrl = '<?php echo $this->request->webroot?>';
</script>
<?= $this->Html->script('customs.js') ?>
</html>
