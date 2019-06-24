<?= $this->Html->link(__('< Inapoi la comenzi'), ['action' => 'index'], ['class'=>'btn btn-default']) ?>
<hr/>
<h3>Modificare Comanda: #<?= h($order->id) ?></h3>

<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <?php
            echo $this->Form->input('first_name', ['class' => 'form-control', 'label' => 'Prenume']);
            echo $this->Form->input('last_name', ['class' => 'form-control', 'label' => 'Nume']);
            echo $this->Form->input('email', ['class' => 'form-control', 'label' => 'E-mail']);
            echo $this->Form->input('phone', ['class' => 'form-control', 'label' => 'Telefon']);
            echo $this->Form->input('billing_address', ['class' => 'form-control', 'label' => 'Adresa de Facturare']);
            echo $this->Form->input('billing_address2', ['class' => 'form-control', 'label' => 'Adresa de Facturare 2']);
            echo $this->Form->input('billing_city', ['class' => 'form-control', 'label' => 'Oras de Facturare']);
            echo $this->Form->input('billing_zip', ['class' => 'form-control', 'label' => 'Cod Postal de Facturare']);
            echo $this->Form->input('billing_county', ['class' => 'form-control', 'label' => 'Judet de Facturare']);
            echo $this->Form->input('shipping_address', ['class' => 'form-control', 'label' => 'Adresa de Livrare']);
            echo $this->Form->input('shipping_address2', ['class' => 'form-control', 'label' => 'Adresa de Livrare 2']);
            echo $this->Form->input('shipping_city', ['class' => 'form-control', 'label' => 'Oras de Livrare']);
            echo $this->Form->input('shipping_zip', ['class' => 'form-control', 'label' => 'Cod Postal de Livrare']);
            echo $this->Form->input('shipping_county', ['class' => 'form-control', 'label' => 'Judet de Livrare']);
            echo $this->Form->input('shipping', ['class' => 'form-control', 'label' => 'Livrare']);
            echo $this->Form->input('shipping_method', ['label' => 'Metoda de livrare', 'class' => 'form-control', 'id' => 'shipping_method',
                'options' => ['quote' => 'Livrare la adresa', 'pickup' => 'Ridica comanda din magazin']
            ]);

            echo $this->Form->input('payment_method', [
                        'label' => 'Metoda de Plata',
                        'class' => 'form-control',
                        'options' => [
                            'cod' => 'Ramburs la curier',
                            'payment_order' => 'Ordin de Plata',
                            'paypal' => 'PayPal'
                        ]
                    ]);
            echo $this->Form->input('note', ['class' => 'form-control', 'label' => 'Nota']);
        ?>
    </fieldset>
    <br/>
    <?= $this->Form->button(__('Modifica'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
