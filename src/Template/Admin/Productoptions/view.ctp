<h3><?= h($productoption->name) ?></h3>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th>Id</th>
        <td><?= $this->Number->format($productoption->id) ?></td>
    </tr>
    <tr>
        <th>Produs</th>
        <td><?= $productoption->has('product') ? $this->Html->link($productoption->product->name, ['controller' => 'Products', 'action' => 'view', $productoption->product->id]) : '' ?></td>
    </tr>
    <tr>
        <th>Nume optiune</th>
        <td><?= h($productoption->name) ?></td>
    </tr>
    <tr>
        <th>Pret optiune</th>
        <td><?= $this->Number->format($productoption->price) ?></td>
    </tr>
    <tr>
        <th>Activ</th>
        <td><?= $this->Number->format($productoption->active) ?></td>
    </tr>
</table>

<h3>Actiuni</h3>

<?= $this->Html->link('Modificare Optiune de Produs', ['action' => 'edit', $productoption->id], ['class' => 'btn btn-default']); ?>
<?= $this->Form->postLink('Stergere Optiune de Produs', ['action' => 'delete', $productoption->id], ['class' => 'btn btn-danger', 'confirm' => __('Sunteti sigur(a) ca doriti sa stergeti optiunea de produs # {0}?', $productoption->id)]) ?>

<br />
<br />