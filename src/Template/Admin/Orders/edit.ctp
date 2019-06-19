<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orderproducts'), ['controller' => 'Orderproducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderproduct'), ['controller' => 'Orderproducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Modificare Comanda') ?></legend>
        <?php
            echo $this->Form->input('first_name', 'Prenume');
            echo $this->Form->input('last_name', 'Nume');
            echo $this->Form->input('email', 'E-mail');
            echo $this->Form->input('phone', 'Telefon');
            echo $this->Form->input('billing_address', 'Adresa de Facturare');
            echo $this->Form->input('billing_address2', 'Adresa de Facturare 2');
            echo $this->Form->input('billing_city', 'Oras de Facturare');
            echo $this->Form->input('billing_zip', 'Cod Postal de Facturare');
            echo $this->Form->input('billing_county', 'Judet de Facturare');
            echo $this->Form->input('shipping_address', 'Adresa de Livrare');
            echo $this->Form->input('shipping_address2', 'Adresa de Livrare 2');
            echo $this->Form->input('shipping_city', 'Oras de Livrare');
            echo $this->Form->input('shipping_zip', 'Cod Postal de Livrare');
            echo $this->Form->input('shipping_county', 'Judet de Livrare');
            echo $this->Form->input('weight', 'Greutate');
            echo $this->Form->input('order_item_count', 'Numar de produse in comanda');
            echo $this->Form->input('subtotal', 'Subtotal');
            echo $this->Form->input('tax', 'TVA');
            echo $this->Form->input('shipping', 'Livrare');
            echo $this->Form->input('total', 'Total');
            echo $this->Form->input('shipping_method', 'Metoda de Livrare');
            echo $this->Form->input('payment_method', 'Metoda de Plata');
            echo $this->Form->input('creditcard_number', 'Numar Card de Credit');
            echo $this->Form->input('creditcard_code', 'Cod CVC');
            echo $this->Form->input('creditcard_year', 'An expirare Card de Credit');
            echo $this->Form->input('creditcard_month', 'Luna expirare Card de Credit');
            echo $this->Form->input('authorization', 'Autorizatie');
            echo $this->Form->input('transaction', 'Tranzactie');
            echo $this->Form->input('status', 'Stare');
            echo $this->Form->input('ip_address', 'Adresa IP');
            echo $this->Form->input('note', 'Nota');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Modifica')) ?>
    <?= $this->Form->end() ?>
</div>
