<h2>Schimbare parola user</h2>

<br />

<div class="row">
    <div class="col-sm-4">

        <?php echo $this->Form->create($user);?>
        <?php echo $this->Form->input('id', ['class' => 'form-control']); ?>
        <?php echo $this->Form->input('password', ['class' => 'form-control input-sm', 'value' => '', 'label' => 'Parola']); ?>
        <br />
        <?php echo $this->Form->button('Modifica', ['class' => 'btn btn-primary']) ;?>
        <?php echo $this->Form->end();?>

    </div>
</div>