<?php

$title_for_layout = 'Sumar Comanda';
$description = 'Sumar Comanda';
$keywords = 'Sumar, Comanda';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<?php echo $this->Html->script(['jquery.validate.js', 'additional-methods.js', 'order_review.js'], ['block' => 'script']); ?>

<h1>Plasare comanda - Revizuieste si plaseaza comanda</h1>

<hr>

<div class="row">
    <div class="col col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Detalii Client</b>
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                Email: <?php echo $shop['Order']['email'];?><br />
                Telefon: <?php echo $shop['Order']['phone'];?>
                <br />
                <br />
            </div>
        </div>
    </div>
    <div class="col col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Adresa Facturare</b>
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                <?php echo $shop['Order']['billing_address'];?> <?php echo $shop['Order']['billing_address2'];?><br />
                <?php echo $shop['Order']['billing_city'];?>,  <?php echo $shop['Order']['billing_county'];?> <?php echo $shop['Order']['billing_zip'];?><br />

            </div>
        </div>
    </div>
</div>

<hr>

<div class="row small">
    <div class="col col-sm-1">#</div>
    <div class="col col-sm-8">PRODUS</div>
    <div class="col col-sm-1">PRET</div>
    <div class="col col-sm-1" style="text-align: right;">CANTITATE</div>
    <div class="col col-sm-1" style="text-align: right;">SUBTOTAL</div>
</div>

<br />
<br />

<?php foreach ($shop['Orderproducts'] as $item): ?>
<div class="row">
    <div class="col col-sm-1"><?php echo $this->Html->image('/images/small/' . $item['image'], ['height' => 60, 'class' => 'img-fluid']); ?></div>
    <div class="col col-sm-8">
    <?php echo $item['name']; ?>
    <?php if(isset($item['productoption_name'])) : ?>
    <br />
    <small><?php echo $item['productoption_name']; ?></small>
    <?php endif; ?>
    </div>
    <div class="col col-sm-1"><?php echo $item['price']; ?> RON</div>
    <div class="col col-sm-1" style="text-align: right;"><?php echo $item['quantity']; ?></div>
    <div class="col col-sm-1" style="text-align: right;"><?php echo $item['subtotal']; ?> RON</div>
</div>
<?php endforeach; ?>

<hr>

<div class="row">
    <div class="col col-sm-12 tr">
        <strong>Detalii Comanda:</strong><br />
        Subtotal: <?php echo $shop['Order']['subtotal']; ?> RON<br />
        <?php if ($shop['Order']['shipping_method'] == 'quote') {?>
        Taxa livrare: <?php echo $shop['Order']['shipping']; ?> RON<br />
        <?php }?>
        TVA: <?php echo $shop['Order']['tax']; ?> RON<br />
        <br />
        <big><strong>Total Comanda: <span class="textred"><?php echo $shop['Order']['total']; ?> RON</span></strong></big><br />
    </div>
</div>

<hr>

<br />

<?php echo $this->Form->create($order, ['id' => 'OrderReviewForm']); ?>

<div class="row">
    <div class="col col-sm-4">
        <?php echo $this->Form->input('comment', ['label' => 'Adaugati detalii despre comanda', 'rows' => 3, 'class' => 'form-control ccinput']); ?>
    </div>
</div>

<br />
<br />

<strong><i class="fa fa-truck"></i> ADRESA DE LIVRARE</strong>
<br />
<br />

<?php if ($shop['Order']['shipping_method'] == 'quote') {?>
	<?php echo $shop['Order']['shipping_address'];?> <?php echo $shop['Order']['shipping_address2'];?><br />
	<?php echo $shop['Order']['shipping_city'];?>,  <?php echo $shop['Order']['shipping_county'];?> <?php echo $shop['Order']['shipping_zip'];?><br />
	<br />
<?php } else {?>
Ridicare din magazin: Mihai Bravu 103, Bucuresti 021342
<?php }?>
<br />
<br />
<br />

<strong><i class="fa fa-money"></i> METODA DE PLATA</strong>

<br />
<br />

<div class="row">
    <div class="col col-sm-4">
        <?php echo $this->Form->input('payment_method', [
            'label' => false,
            'class' => 'form-control ccinput',
            'options' => [
                'cod' => 'Ramburs la curier',
                'payment_order' => 'Ordin de Plata',
                'paypal' => 'PayPal'
            ]
        ]); ?>
    </div>
</div>

<br />
<div id="payment_order_block" style="display:none">
    <div class="row">
        <div class="col col-sm-12">
        	Plasati comanda pentru a putea vedea detaliile ordinului de plata
        </div>
    </div>
</div>

<div id="paypal_block" style="display:none">
    <div class="row">
        <div class="col col-sm-12">
        	Plasati comanda pentru a fi redirectat catre siteul PayPal pentru a efectua plata online
        </div>
    </div>
</div>

<br />

<?php echo $this->Form->button('<i class="fa fa-arrow-left"></i> &nbsp; Inapoi', ['type' => 'button', 'class' => 'btn btn-secondary','onclick' => 'window.history.back();']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Plasati comanda', ['class' => 'btn btn-success', 'ecape' => false]); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />
