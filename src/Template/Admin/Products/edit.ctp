<h2>Edit Product</h2>

<br />
<br />

<div class="row">
    <div class="col-sm-5">
        <?= $this->Form->create($product) ?>
        <?php echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true, 'class' => 'form-control', 'label' => 'Categorie']); ?>
        <br />
        <?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => 'Nume']); ?>
        <br />
        <?php echo $this->Form->input('slug', ['class' => 'form-control']); ?>
        <br />
        <?php echo $this->Form->input('description', ['class' => 'form-control', 'rows' => 8, 'label' => 'Descriere']); ?>
        <br />
        <?php echo $this->Form->input('image', ['class' => 'form-control', 'label' => 'Nume imagine']); ?>
        <br />
        <?php echo $this->Form->input('price', ['class' => 'form-control', 'label' => 'Pret']); ?>
        <br />
        <?php echo $this->Form->input('weight', ['class' => 'form-control', 'label' => 'Greutate']); ?>
        <br />
        <?php echo $this->Form->input('quantity', ['class' => 'form-control', 'label' => 'Cantitate']); ?>
        <br />
        <?php echo $this->Form->input('active', ['type' => 'checkbox', 'label' => 'Activ']); ?>
        <br />
        <?php echo $this->Form->button('Acceptare', ['class' => 'btn btn-primary']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<br />
<br />
