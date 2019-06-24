<h2>Adaugare Optiuni de Produs</h2>

<br />
<br />

<div class="row">
    <div class="col-sm-5">
        <?= $this->Form->create($productcrosssale) ?>
        <?php echo $this->Form->input('base_product_id', ['options' => $products, 'empty' => true, 'class' => 'form-control', 'label' => 'Produs de baza']); ?>
        <br />
        <?php echo $this->Form->input('cross_sale_product_id', ['options' => $products, 'empty' => true, 'class' => 'form-control', 'label' => 'Produs Asociat']); ?>
        <br />
        <?php echo $this->Form->button('Adauga', ['class' => 'btn btn-primary']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<br />
<br />
