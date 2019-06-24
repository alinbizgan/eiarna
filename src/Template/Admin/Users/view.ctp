<h2>Vizualizare Utilizator: <?php echo h($user->first_name); ?> <?php echo h($user->last_name); ?></h2>
<hr/>

<table class="table-striped table-bordered table-condensed table-hover table-sm">
    <tr>
        <td>Id</td>
        <td><?php echo h($user->id); ?></td>
    </tr>
    <tr>
        <td>Rol</td>
        <td><?php echo h($user->role)== 'admin'?'Administrator':'Reprezentant vanzari'; ?></td>
    </tr>
    <tr>
        <td>Prenume</td>
        <td><?php echo h($user->first_name); ?></td>
    </tr>
    <tr>
        <td>Nume</td>
        <td><?php echo h($user->last_name); ?></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><?php echo h($user->email); ?></td>
    </tr>
    <tr>
        <td>Activ</td>
        <td><?php echo $this->Html->link($this->Html->image('icon_' . $user->active . '.png'), array('controller' => 'users', 'action' => 'toggle', 'active', $user->id), array('class' => 'toggle', 'escape' => false)); ?></td>
    </tr>
    <tr>
        <td>Nr. login</td>
        <td><?php echo h($user->login_count); ?></td>
    </tr>
    <tr>
        <td>Ultima logare</td>
        <td><?php echo h($user->login_last); ?></td>
    </tr>
    <tr>
        <td>Creat</td>
        <td><?php echo h($user->created); ?></td>
    </tr>
    <tr>
        <td>Modificat</td>
        <td><?php echo h($user->modified); ?></td>
    </tr>
</table>

<br />
<br />

<h3>Actiuni</h3>

<br />

<?php echo $this->Html->link('Modificare user', ['action' => 'edit', $user->id], ['class' => 'btn btn-default']); ?>

<?php echo $this->Form->postLink('Stergere user', ['action' => 'delete', $user->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); ?>

<br />
<br />

