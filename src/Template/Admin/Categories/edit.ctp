<h2>Modificare Categorie</h2>

<br />
<br />

<div class="row">
    <div class="col-sm-5">
        <?= $this->Form->create($category) ?>

        <?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => 'Nume']); ?>
        <br />
        <?php echo $this->Form->input('slug', ['class' => 'form-control', 'label' => 'Slug']); ?>
        <br />
        <?php echo $this->Form->input('description', ['class' => 'form-control', 'rows' => 8, 'label' => 'Descriere']); ?>
        <br />
        <?php echo $this->Form->input('sort', ['class' => 'form-control', 'label' => 'Indice sortare']); ?>
        <br />
        <?php echo $this->Form->input('active', ['type' => 'checkbox', 'label' => 'Activ']); ?>
        <br />
        <?php echo $this->Form->button('Acceptare', ['class' => 'btn btn-primary']); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<br />
<br />

