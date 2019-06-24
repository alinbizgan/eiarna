<h3>Comenzi</h3>

<?php echo $this->element('pagination'); ?>

<table class="table-striped table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('first_name', 'Prenume') ?></th>
            <th><?= $this->Paginator->sort('last_name', 'Nume') ?></th>
            <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
            <th><?= $this->Paginator->sort('phone', 'Telefon') ?></th>
            <th><?= $this->Paginator->sort('total', 'Total') ?></th>
            <th><?= $this->Paginator->sort('created', 'Creat') ?></th>
            <th><?= $this->Paginator->sort('note', 'Comentariu') ?></th>
            <th><?= $this->Paginator->sort('status', 'Status') ?></th>
            <th class="actions"><?= __('Actiuni') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= h($order->first_name) ?></td>
                <td><?= h($order->last_name) ?></td>
                <td><?= h($order->email) ?></td>
                <td><?= h($order->phone) ?></td>
                <td><?= h($order->total) ?> RON</td>
                <td><?= h($order->created) ?></td>
                <td><span class="note" data-value="<?php echo $order->note; ?>" data-pk="<?php echo $order->id; ?>"><?php echo $order->note; ?></span></td>
                <td><?= h($order->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Vizualizare'), ['action' => 'view', $order->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?php if($order->status != 'ANULATA' && $order->status != 'LIVRATA') { ?>
                        <?= $this->Html->link(__('Modificare'), ['action' => 'edit', $order->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo $this->element('pagination'); ?>
