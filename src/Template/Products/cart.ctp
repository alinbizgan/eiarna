<?php
$title_for_layout = 'Cart cumparaturi';
$description = 'Cart cumparaturi';
$keywords = 'Cart';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<?php echo $this->Html->script(['product_cart.js'], ['block' => 'script']); ?>

<h1>Cart cumparaturi</h1>

<?php if(empty($shop)) : ?>

Cartul dumneavoastra este gol

<?php else: ?>

<?php echo $this->Form->create(NULL, ['url' => ['controller' => 'products', 'action' => 'cartupdate']]); ?>

<hr>

<div class="row small">
    <div class="col-md-1 col-sm-1 col-12">#</div>
    <div class="col-md-7 col-sm-4 col-12">PRODUS</div>
    <div class="col-md-1 col-sm-2 col-12">PRET</div>
    <div class="col-md-1 col-sm-2 col-12">CANTITATE</div>
    <div class="col-md-1 col-sm-2 col-12">SUBTOTAL</div>
    <div class="col-md-1 col-sm-1 col-12">STERGE</div>
</div>
<br />

<?php $tabindex = 1; ?>
<?php foreach ($shop['Orderproducts'] as $key => $item): ?>

    <div class="row" id="row_<?php echo $item['product_id']; ?>_<?php echo $item['productoption_id']; ?>">
        <div class="col-md-1 col-sm-1 col-12"><?php echo $this->Html->image('/images/small/' . $item['image'], ['class' => 'img-fluid']); ?></div>
        <div class="col-md-7 col-sm-4 col-12">
            <strong><?php echo $this->Html->link($item['name'], ['controller' => 'products', 'action' => 'view', $item['slug']]); ?></strong>
            <?php
            $mods = 0;
            if(isset($item['productoption_name'])) :
            $mods = $item['productoption_id'];
            ?>
            <br />
            <small><?php echo $item['productoption_name']; ?></small>
            <?php endif; ?>
        </div>
        <div class="col-md-1 col-sm-2 col-12" id="price-<?php echo $key; ?>"><?php echo $item['price']; ?> RON</div>
        <div class="col-md-1 col-sm-2 col-3"><?php echo $this->Form->input('quantity-' . $key, ['label' => false, 'div' => false, 'class' => 'numeric form-control input-small', 'type' => 'tel', 'size'=> 2, 'min' => 1, 'max' => 99, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['product_id'], 'data-mods' => $mods, 'value' => $item['quantity']]); ?></div>
        <div class="col-md-1 col-sm-2 col-12" id="subtotal-<?php echo $key; ?>"><?php echo $item['subtotal']; ?> RON</div>
        <div class="col-md-1 col-sm-1 col-12"><?php echo $this->Html->link('<i class="fa fa-trash"></i>', ['controller' => 'products', 'action' => 'remove', $key], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]); ?></div>
    </div>
    <br />
<?php endforeach; ?>

<hr>

<div class="row">
    <div class="col col-sm-12">
        <div class="pull-right">
        <?php echo $this->Html->link('<i class="fa fa-ban"></i> &nbsp; Goleste cartul', ['controller' => 'products', 'action' => 'clear'], ['class' => 'btn btn-danger btn-sm', 'escape' => false]); ?>
        &nbsp; &nbsp;
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col col-sm-12 pull-right tr">

        Subtotal: <span class="nor1mal" id="subtotal"><?php echo $shop['Order']['subtotal']; ?> RON</span>
        <br />
        <br />

        <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> &nbsp; Continua cumparaturile', ['controller' => 'products', 'action' => 'index', '_ssl' => false], ['class' => 'btn btn-secondary btn-sm', 'escape' => false]); ?>

        &nbsp; &nbsp; &nbsp; &nbsp;

        <?php echo $this->Html->link('<i class="fa fa-check"></i> &nbsp; Continua', ['controller' => 'orders', 'action' => 'address', '_ssl' => false], ['class' => 'btn btn-success btn-sm', 'escape' => false]); ?>

        <br />
        <br />

    </div>
</div>

<?php endif; ?>


<!-- <pre>
<?php  //print_r($shop); ?>
</pre> -->

