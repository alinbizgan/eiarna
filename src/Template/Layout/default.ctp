<!doctype html>
<html dir="ltr" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo !isset($title_for_layout) ? '' : $title_for_layout ; ?></title>
<meta name="description" content="<?php echo empty($description) ? '' : $description ; ?>" />
<meta name="keywords" content="<?php echo empty($keywords) ? '' : $keywords ; ?>" />
<meta property="og:title" content="<?php echo !isset($title_for_layout) ? '' : $title_for_layout ; ?>">
<meta property="og:description" content="<?php echo !isset($description) ? '' : $description ; ?>">
<meta property="og:url" content="<?php //echo Router::url( $this->here, true ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">


<?php echo $this->Html->css('bootstrap.min.css'); ?>
<?php echo $this->Html->css('font-awesome.min.css'); ?>
<?php echo $this->Html->css('css.css'); ?>
<?php echo $this->Html->css('easyzoom.css'); ?>
<?php echo $this->Html->css('jquery.rateyo.min.css'); ?>

<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'); ?>
<?php echo $this->Html->script('easyzoom.js'); ?>
<?php echo $this->Html->script('jquery.rateyo.min.js'); ?>

<?php echo $this->Html->script('js.js'); ?>
<?php echo $this->Html->script('bootstrap.bundle.min.js'); ?>

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
<script>
	var baseRoot = <?php echo $this->Url->build('/');?>;
</script>
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
			<a class="navbar-brand" href="/eiarna"><img src="/eiarna/webroot/images/images.png" width="35" height="35" alt=""> eIarna</a>
            <?php if (!isset($isLogin)) { ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><?php echo $this->Html->link('Acasa', ['controller' => 'products', 'action' => 'index', '_full' => true], ['class' => 'nav-link']); ?></li>
                    <li class="nav-item"><?php echo $this->Html->link('Categorii produse', ['controller' => 'categories', 'action' => 'index', '_full' => true], ['class' => 'nav-link']); ?></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="<?php echo $this->Url->build('/cart', true); ?>" class="btn btn-outline-light my-2 my-sm-0""><i class="fa fa-cart-plus"></i> &nbsp; Cart cumparaturi (<span id="quantitybutton"><?php echo $this->request->session()->read('Shop.Order.quantity')== NULL ? '0' : $this->request->session()->read('Shop.Order.quantity'); ?></span>)</a>
                </form>
            </div>
            <?php }?>
        </div>
    </nav>
    <div class="main">
        <div class="container">
            <?= $this->Flash->render(); ?>
            <?php echo $this->Html->getCrumbs('&nbsp;/&nbsp;', '', ['class' => 'breadcr1umb']); ?>
            <?php echo $this->fetch('content'); ?>
            <br />
            <br />
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    eIarna magazin online
                    <br />
                </div>
                <div class="col-sm-4">
                    <br />
                    <br />
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-right">
                    &copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></small>
                    <br />
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
