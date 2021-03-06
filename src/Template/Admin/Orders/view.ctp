<?= $this->Html->link(__('< Inapoi la comenzi'), ['action' => 'index'], ['class'=>'btn btn-default']) ?>
<hr/>
<h3>Detalii Comanda: #<?= h($order->id) ?></h3>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th><?= __('Id') ?></th>
        <td><?= $order->id; ?></td>
    </tr>
    <tr>
        <th><?= __('Prenume') ?></th>
        <td><?= h($order->first_name) ?></td>
    </tr>
    <tr>
        <th><?= __('Nume') ?></th>
        <td><?= h($order->last_name) ?></td>
    </tr>
    <tr>
        <th><?= __('E-mail') ?></th>
        <td><?= h($order->email) ?></td>
    </tr>
    <tr>
        <th><?= __('Telefon') ?></th>
        <td><?= h($order->phone) ?></td>
    </tr>
    <tr>
        <th><?= __('Adresa de Facturare') ?></th>
        <td><?= h($order->billing_address) ?></td>
    </tr>
    <tr>
        <th><?= __('Adresa de Facturare 2') ?></th>
        <td><?= h($order->billing_address2) ?></td>
    </tr>
    <tr>
        <th><?= __('Oras de Facuturare') ?></th>
        <td><?= h($order->billing_city) ?></td>
    </tr>
    <tr>
        <th><?= __('Cod Postal de Facturare') ?></th>
        <td><?= h($order->billing_zip) ?></td>
    </tr>
    <tr>
        <th><?= __('Judet de Facturare') ?></th>
        <td><?= h($order->billing_county) ?></td>
    </tr>
    <tr>
        <th><?= __('Adresa de Livrare') ?></th>
        <td><?= h($order->shipping_address) ?></td>
    </tr>
    <tr>
        <th><?= __('Adresa de Livrare 2') ?></th>
        <td><?= h($order->shipping_address2) ?></td>
    </tr>
    <tr>
        <th><?= __('Oras de Livrare') ?></th>
        <td><?= h($order->shipping_city) ?></td>
    </tr>
    <tr>
        <th><?= __('Cod Postal de Livrare') ?></th>
        <td><?= h($order->shipping_zip) ?></td>
    </tr>
    <tr>
        <th><?= __('Judet de Livrare') ?></th>
        <td><?= h($order->shipping_county) ?></td>
    </tr>
    <tr>
        <th><?= __('Metoda de Livrare') ?></th>
        <td><?= h($order->shipping_method) ?></td>
    </tr>
    <tr>
        <th><?= __('Metoda de plata') ?></th>
        <td><?= h($order->payment_method) ?></td>
    </tr>
    <tr>
        <th><?= __('Stare') ?></th>
        <td><?= h($order->status) ?></td>
    </tr>
    <tr>
        <th><?= __('Adresa IP') ?></th>
        <td><?= h($order->ip_address) ?></td>
    </tr>
    <tr>
        <th><?= __('Greutate') ?></th>
        <td><?= $order->weight ?></td>
    </tr>
    <tr>
        <th><?= __('Numar produse in comanda') ?></th>
        <td><?= $order->order_item_count ?></td>
    </tr>
    <tr>
        <th><?= __('Subtotal') ?></th>
        <td><?php echo $order->subtotal; ?></td>
    </tr>
    <tr>
        <th><?= __('TVA') ?></th>
        <td><?php echo $order->tax; ?></td>
    </tr>
    <tr>
        <th><?= __('Livrare') ?></th>
        <td><?php echo $order->shipping; ?></td>
    </tr>
    <tr>
        <th><?= __('Total') ?></th>
        <td><?php echo $order->total; ?></td>
    </tr>
    <tr>
        <th><?= __('Comentariu') ?></th>
        <td><?= $order->comment ?></td>
    </tr>
    <tr>
        <th><?= __('Nota') ?></th>
        <td><?= $order->note ?></td>
    </tr>
    <tr>
        <th><?= __('Status') ?></th>
            <td><?= $order->status ?></td>
    </tr>
    <tr>
        <th><?= __('Creat') ?></th>
        <td><?= h($order->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modificat') ?></th>
        <td><?= h($order->modified) ?></td>
    </tr>
</table>

<br />
<br />

<?php if($order->status != 'ANULATA' && $order->status != 'LIVRATA' ) { ?>
    <h3><?= __('Actiuni') ?></h3>
    <?= $this->Html->link(__('Modificare Comanda'), ['action' => 'edit', $order->id], ['class' => 'btn btn-info']); ?>
        <?= $this->Form->postLink(__('Anulare Comanda'), ['action' => 'cancel', $order->id], ['class' => 'btn btn-danger', 'confirm' => __('Sunteti sigur(a) ca vreti sa anulati comanda #{0}?', $order->id)]) ?>
        <?= $this->Form->postLink(__('Marcare Comanda Livrata'), ['action' => 'delivered', $order->id], ['class' => 'btn btn-success', 'confirm' => __('Sunteti sigur(a) ca doriti sa marcati ca livrata comanda #{0}?', $order->id)]) ?>
<?php } else if($order->status == 'ANULATA') { ?>
    <h2 style="color: red"><i>ACEASTA COMANDA A FOST ANULATA</i></h2>
<?php } else if($order->status == 'LIVRATA') {  ?>
    <h2 style="color: green"><i>ACEASTA COMANDA A FOST LIVRATA</i></h2>
<?php }  ?>

<br />
<br />
<h4><?= __('Produse in Comanda') ?></h4>
<?php if (!empty($order->orderproducts)): ?>
    <table class="table-striped table-bordered table-condensed table-hover">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Id Comanda') ?></th>
            <th><?= __('Id Produs') ?></th>
            <th><?= __('Id Optiune de Produs') ?></th>
            <th><?= __('Nume Produs') ?></th>
            <th><?= __('Nume Optiune de Produs') ?></th>
            <th><?= __('Cantitate') ?></th>
            <th><?= __('Greutate') ?></th>
            <th><?= __('Pret') ?></th>
            <th><?= __('Subtotal') ?></th>
            <th><?= __('Nota') ?></th>
            <th><?= __('Creat') ?></th>

        </tr>
        <?php foreach ($order->orderproducts as $orderproducts): ?>
            <tr>
                <td><?= h($orderproducts->id) ?></td>
                <td><?= h($orderproducts->order_id) ?></td>
                <td><?= h($orderproducts->product_id) ?></td>
                <td><?= h($orderproducts->productoption_id) ?></td>
                <td><?= h($orderproducts->name) ?></td>
                <td><?= h($orderproducts->productoption_name) ?></td>
                <td><?= h($orderproducts->quantity) ?></td>
                <td><?= h($orderproducts->weight) ?></td>
                <td><?= number_format($orderproducts->price, 2) ?></td>
                <td><?= number_format($orderproducts->subtotal, 2) ?></td>
                <td><?= h($orderproducts->note) ?></td>
                <td><?= h($orderproducts->created) ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
