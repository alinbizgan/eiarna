<?php
$title_for_layout = 'Sumar Comanda';
$description = 'Sumar Comanda';
$keywords = 'Sumar, Comanda';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<?php echo $this->Html->script(['jquery.validate.js', 'additional-methods.js', 'order_review.js'], ['block' => 'script']); ?>

<h1>Revizuieste si plaseaza comanda</h1>

<hr>

<div class="row">
    <div class="col col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalii Client
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
    <div class="col col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Adresa Facturare
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                <?php echo $shop['Order']['billing_address'];?><br />
                <?php echo $shop['Order']['billing_address2'];?><br />
                <?php echo $shop['Order']['billing_city'];?>,  <?php echo $shop['Order']['billing_county'];?> <?php echo $shop['Order']['billing_zip'];?><br />

            </div>
        </div>
    </div>
    <div class="col col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                Adresa Livrare
            </div>
            <div class="panel-body">
                <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
                <?php echo $shop['Order']['shipping_address'];?><br />
                <?php echo $shop['Order']['shipping_address2'];?><br />
                <?php echo $shop['Order']['shipping_city'];?>,  <?php echo $shop['Order']['shipping_county'];?> <?php echo $shop['Order']['shipping_zip'];?><br />
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

<strong><i class="fa fa-truck"></i> METODA DE LIVRARE</strong>
<br />
<br />

<?php echo $this->Form->radio('shipping_method', [['value' => 'quote', 'text' => false, 'checked']], ['hiddenField' => false]); ?> !!!!!!!!!!!!ALEGE ADRESA!!!!!!.
<br />
<small>!!!!!!!!!!!!!!!!!!!!!!.</small>
<br />
<br />
<?php echo $this->Form->radio('shipping_method', [['value' => 'pickup', 'text' => false]], ['hiddenField' => false]); ?> Ridica comanda din magazin.
<br />
<small>Mihai Bravu 103, Bucuresti 021342</small>
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
            'credit_card' => 'Card de credit',
            'cod' => 'Ramburs la curier',
            ]
        ]); ?>
    </div>
</div>

<div id="paymentblock">

<br />
<br />

<div class="row">
    <div class="col col-sm-4">

        <strong>Card de credit sau debit</strong>
        <br />
        <?php echo $this->Form->input('creditcard_number', ['label' => false, 'class' => 'form-control ccinput', 'required' => false, 'type' => 'tel', 'maxLength' => 16, 'autocomplete' => 'off']); ?>
        <br />
    </div>
    <div class="col col-sm-2">

        <strong>Cod securitate card</strong>
        <a tabindex="9999" id="cscpop" role="button" data-placement="right" data-toggle="popover" data-trigger="focus" title="Card Security Code (CSC)" data-content="<small><strong>Visa, MasterCard, Discover</strong><br /><img src=/img/visa.png><br / >The security code is the last three digits of the number that appears on the back of your card in the signature bar. <br /><br /><strong>American Express</strong><br /><img src=/img/amex.png><br />The security code is the four digits located on the front of the card, on the right side.</small>"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
        <br />
        <?php echo $this->Form->input('creditcard_code', ['label' => false, 'required' => false, 'class' => 'form-control', 'type' => 'tel', 'maxLength' => 4]); ?>
        <br />
    </div>
</div>

<div class="row">
    <div class="col col-sm-3 col-6">
        <?php echo $this->Form->input('creditcard_month', [
            'label' => 'Luna de expirare',
            'class' => 'form-control',
            'empty' => 'Alegeti',
            'options' => [
                '01' => '01 - Ianuarie',
                '02' => '02 - Februarie',
                '03' => '03 - Martie',
                '04' => '04 - Aprilie',
                '05' => '05 - Mai',
                '06' => '06 - Iunie',
                '07' => '07 - Iulie',
                '08' => '08 - August',
                '09' => '09 - Septembrie',
                '10' => '10 - Octombrie',
                '11' => '11 - Noviembrie',
                '12' => '12 - Decembrie'
            ]
        ]); ?>
    </div>
    <div class="col col-sm-3 col-6">
        <?php echo $this->Form->input('creditcard_year', [
            'label' => 'An de expirare',
            'class' => 'form-control',
            'empty' => 'Alegeti',
            'options' => array_combine(range(date('y'), date('y') + 10), range(date('Y'), date('Y') + 10))
        ]);?>
    </div>
</div>

</div>

<br />
<br />

<?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Plasati comanda', ['class' => 'btn btn-success', 'ecape' => false]); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />
