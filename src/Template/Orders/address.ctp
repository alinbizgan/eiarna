<?php $this->set('title_for_layout', 'Address'); ?>

<?php echo $this->Html->script(['order_address.js'], ['block' => 'script']); ?>

<h1>Address</h1>

<?php echo $this->Form->create($order); ?>

<hr>

<div class="row">
    <div class="col col-sm-4">

        <?php echo $this->Form->input('first_name', ['class' => 'form-control', 'label' => ('Prenume')]); ?>
        <br />
        <?php echo $this->Form->input('last_name', ['class' => 'form-control', 'label' => ('Nume')]); ?>
        <br />
        <?php echo $this->Form->input('email', ['class' => 'form-control', 'label' => ('E-mail')]); ?>
        <br />
        <?php echo $this->Form->input('phone', ['class' => 'form-control', 'label' => ('Telefon')]); ?>
        <br />
        <br />

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('billing_address', ['class' => 'form-control', 'label' => ('Adresa facturare')]); ?>
        <br />
        <?php echo $this->Form->input('billing_address2', ['class' => 'form-control', 'label' => ('Adresa facturare 2')]); ?>
        <br />
        <?php echo $this->Form->input('billing_city', ['class' => 'form-control', 'label' => ('Oras facturare')]); ?>
        <br />
        <?php echo $this->Form->input('billing_county', ['options' => $this->Site->counties(), 'empty' => 'Alegeti', 'class' => 'form-control', 'label' => ('Judet facturare')]); ?>
        <br />
        <?php echo $this->Form->input('billing_zip', ['class' => 'form-control', 'label' => ('Cod postal facturare')]); ?>
        <br />
        <br />

        <?php echo $this->Form->input('sameaddress', ['type' => 'checkbox', 'label' => 'Copiaza adresa de facturare la livrare']); ?>

    </div>
    <div class="col col-sm-4">

        <?php echo $this->Form->input('shipping_address', ['class' => 'form-control', 'label' => ('Adresa livrare')]); ?>
        <br />
        <?php echo $this->Form->input('shipping_address2', ['class' => 'form-control', 'label' => ('Adresa livrare 2')]); ?>
        <br />
        <?php echo $this->Form->input('shipping_city', ['class' => 'form-control', 'label' => ('Oras livrare')]); ?>
        <br />
        <?php echo $this->Form->input('shipping_county', ['options' => $this->Site->counties(), 'empty' => 'Alegeti', 'class' => 'form-control', 'label' => ('Judet livrare')]); ?>
        <br />
        <?php echo $this->Form->input('shipping_zip', ['class' => 'form-control', 'label' => ('Cod postal livrare')]); ?>
        <br />

    </div>
</div>

<br />

<?php echo $this->Form->button('<i class="fa fa-check"></i> &nbsp; Continua', ['class' => 'btn btn-success btn-sm', 'escape' => false]);?>
<?php echo $this->Form->end(); ?>
