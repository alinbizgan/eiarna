<h2>Add User</h2>

<div class="row">
    <div class="col-sm-5">

        <?= $this->Form->create($user) ?>
        <?php
            echo $this->Form->input('role', ['label' => 'Rol', 'class' => 'form-control', 'id' => 'role',
                    'options' => ['admin' => 'Administrator', 'sales' => 'Reprezentant Vanzari']
                ]);
             ?>
        <br />
        <?php echo $this->Form->input('first_name', ['class' => 'form-control', 'label' => 'Prenume']); ?>
        <br />
        <?php echo $this->Form->input('last_name', ['class' => 'form-control', 'label' => 'Nume']); ?>
        <br />
        <?php echo $this->Form->input('phone', ['class' => 'form-control', 'label' => 'Telefon']); ?>
        <br />
        <?php echo $this->Form->input('email', ['class' => 'form-control', 'label' => 'E-mail']); ?>
        <br />
        <?php echo $this->Form->input('active', ['type' => 'checkbox', 'label' => 'Activ']); ?>
        <br />
        <?php echo $this->Form->button('Creeaza', ['class' => 'btn btn-primary']); ?>
        <?php echo $this->Form->end(); ?>

    </div>
</div>

<br />
<br />
