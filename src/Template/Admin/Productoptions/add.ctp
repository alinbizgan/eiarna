<h2>Adaugare Optiuni de Produs</h2>

<br />
<br />

<div class="row">
    <div class="col-sm-5">
        <?= $this->Form->create($productoption) ?>
        <?php echo $this->Form->input('product_id', ['options' => $products, 'empty' => true, 'class' => 'form-control', 'label' => 'Produs']); ?>
        <br />
        <?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => 'Nume optiune']); ?>
        <br />
        <?php echo $this->Form->input('price', ['class' => 'form-control', 'label' => 'Pret optiune']); ?>
        <br />
        <?php echo $this->Form->input('active', ['type' => 'checkbox', 'label' => 'Activ']); ?>
        <br />
        <?php echo $this->Form->button('Adauga', ['class' => 'btn btn-primary']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<br />
<br />
