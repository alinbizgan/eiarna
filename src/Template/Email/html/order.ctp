<strong>Va multumim pentru comanda!</strong>

<br />
<br />

<table width="100%">
<tr>
    <td valign="top">
        <strong>Informatii client</strong>
        <br />
        <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
        Email: <?php echo $shop['Order']['email'];?><br />
        Telefon: <?php echo $shop['Order']['phone'];?>
    </td>
    <td valign="top">
        <strong>Adresa facturare</strong>
        <br />
        <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
        <?php echo $shop['Order']['billing_address'];?><br />
        <?php echo $shop['Order']['billing_address2'];?><br />
        <?php echo $shop['Order']['billing_city'];?>,  <?php echo $shop['Order']['billing_county'];?> <?php echo $shop['Order']['billing_zip'];?>
    </td>
    <td valign="top">
        <strong>Adresa livrare</strong>
        <br />
        <?php echo $shop['Order']['first_name'];?> <?php echo $shop['Order']['last_name'];?><br />
        <?php echo $shop['Order']['shipping_address'];?><br />
        <?php echo $shop['Order']['shipping_address2'];?><br />
        <?php echo $shop['Order']['shipping_city'];?>,  <?php echo $shop['Order']['shipping_county'];?> <?php echo $shop['Order']['shipping_zip'];?><br />
    </td>
</tr>
</table>

<br />
<br />

<strong>Produse</strong>

<br />

<table width="100%">
    <tr>
        <td>#</td>
        <td>Nume Produse</td>
        <td>Pret</td>
        <td>Cantitate</td>
        <td>Subtotal</td>
    </tr>
<?php foreach ($shop['Orderproducts'] as $item): ?>
    <tr>
        <td><?php echo $this->Html->image('http://localhost/eiarna/images/products/' . $item['image'], ['height' => 60, 'class' => 'px60']); ?></td>
        <td><?php echo $item['name']; ?>
            <?php if(isset($item['productoption_name'])) : ?>
            <br />
            <small><?php echo $item['productoption_name']; ?></small>
            <?php endif; ?>
        </td>
        <td>$<?php echo $item['price']; ?></td>
        <td><?php echo $item['quantity']; ?></td>
        <td>$<?php echo $item['subtotal']; ?></td>
    </tr>
<?php endforeach; ?>
</table>

<br />
<br />

<strong>Detalii comanda:</strong>
<br />
Subtotal: $<?php echo $shop['Order']['subtotal']; ?><br />
TVA: $<?php echo $shop['Order']['tax']; ?><br />
Total Comanda: $<?php echo $shop['Order']['total']; ?><br />

<br />

<strong>Metoda de livrare:</strong>
<br />
<?php echo $order->shipping_method; ?><br />

<br />

<strong>Metoda de plata:</strong>
<br />
<?php echo $order->payment_method; ?><br />

<br />


Va vom contacta in scurt timp pentr detalii.

<br />
<br />

<br />
<br />
<br />
<br />
