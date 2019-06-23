<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ADMIN<?php // echo $title_for_layout; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

<?php echo $this->Html->css('bootstrap.min.css'); ?>

<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />

<?php echo $this->Html->css('admin.css'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->


<?php echo $this->Html->script('bootstrap.bundle.min.js'); ?>
<?php echo $this->Html->script('admin.js'); ?>

<?php echo $this->Html->css('jquery-editable.css'); ?>
<?php echo $this->Html->script('jquery-editable-poshytip.min.js'); ?>

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>

<script>

$(document).ready(function() {

    $.fn.editable.defaults.mode = 'inline';

});

</script>

</head>
<body>

<div style="background:#ccc; color:#FFF; padding:1px;"></div>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #000000 !important;">

        <a class="navbar-brand" href="#"> ADMIN // </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">


                <li class="nav-item"><?php echo $this->Html->link('Useri', ['controller' => 'users', 'action' => 'index'], ['class' => 'nav-link']); ?></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Magazin</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php echo $this->Html->link('Categorii', array('controller' => 'categories', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Produse', array('controller' => 'products', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Optiuni produse', array('controller' => 'productoptions', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                        <?php echo $this->Html->link('Comenzi', array('controller' => 'orders', 'action' => 'index'), ['class' => 'dropdown-item']); ?>
                    </div>
                </li>
            </ul>

            <div class="my-0 my-lg-0">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
 
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown05" data-toggle="dropdown"><?php echo h($user->last_name)?><i class="fa fa-cog"></i></a>

                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="<?php echo $this->Url->build('/users/logout', true); ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">

        <?= $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php // echo $this->element('sql_dump'); ?>

        <br />
        <br />

    </div>

    <div id="footer">
        <p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
    </div>

</body>
</html>

