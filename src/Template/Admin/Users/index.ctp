<h2>Utilizatori Sistem</h2>

<table class="table-striped table-bordered table-condensed table-hover table-sm">
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'Id');?></th>
        <th><?php echo $this->Paginator->sort('role', 'Rol');?></th>
        <th><?php echo $this->Paginator->sort('first_name', 'Prenume');?></th>
        <th><?php echo $this->Paginator->sort('last_name', 'Nume');?></th>
        <th><?php echo $this->Paginator->sort('email', 'E-mail');?></th>
        <th><?php echo $this->Paginator->sort('phone', 'Telefon');?></th>
        <th><?php echo $this->Paginator->sort('active', 'Activ');?></th>
        <th><?php echo $this->Paginator->sort('last_login', 'Ultima logare');?></th>
        <th><?php echo $this->Paginator->sort('logins', 'Nr. logari');?></th>
        <th><?php echo $this->Paginator->sort('created', 'Creat');?></th>
        <th><?php echo $this->Paginator->sort('modified', 'Modificat');?></th>
        <th class="actions">Actiuni</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo h($user->id); ?></td>
        <td><?php echo h($user->role) == 'admin'?'Administrator':'Reprezentant vanzari'; ?></td>
        <td>
            <span class="first_name" data-value="<?php echo $user->first_name; ?>" data-pk="<?php echo $user->id; ?>"><?php echo $user->first_name; ?></span><br />
        </td>
        <td>
            <span class="last_name" data-value="<?php echo $user->last_name; ?>" data-pk="<?php echo $user->id; ?>"><?php echo $user->last_name; ?></span><br />
        </td>
        <td>    
            <span class="email1" data-value="<?php echo $user->email; ?>" data-pk="<?php echo $user->id; ?>"><?php echo $user->email; ?></span><br />
        </td>    
        <td> 
            <span class="phone" data-value="<?php echo $user->phone; ?>" data-pk="<?php echo $user->id; ?>"><?php echo $user->phone; ?></span><br />
        </td>
        <td><?php echo $this->Html->link($this->Html->image('/img/icon_' . $user->active . '.png'), array('controller' => 'users', 'action' => 'toggle', 'active', $user->id), array('class' => 'toggle', 'escape' => false)); ?></td>
        <td>
            <?php echo h($user->login_last); ?><br />
        </td>
        <td>
            <?php echo h($user->login_count); ?><br />
        </td>
        <td>
            <?php echo h($user->created); ?><br />
        </td>
        <td>
            <?php echo h($user->modified); ?><br />
        </td>
        <td class="actions">
            <?php echo $this->Html->link('Vizualizare', array('action' => 'view', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Schimba parola', array('action' => 'password', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
            <?php echo $this->Html->link('Modifica', array('action' => 'edit', $user->id), array('class' => 'btn btn-default btn-xs')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actiuni</h3>

<?php echo $this->Html->link('Creare user nou', array('action' => 'add'), array('class' => 'btn btn-default')); ?>

<br />
<br />
