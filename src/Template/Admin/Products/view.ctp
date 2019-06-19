<h3><?= h($product->name) ?></h3>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($product->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Categorie') ?></th>
        <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Nume') ?></th>
        <td><?= h($product->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Slug') ?></th>
        <td><?= h($product->slug) ?></td>
    </tr>
    <tr>
        <th><?= __('Descriere') ?></th>
        <td><?= h($product->description) ?></td>
    </tr>
    <tr>
        <th><?= __('Cale imagine') ?></th>
        <td><?= h($product->image) ?></td>
    </tr>
    <tr>
        <th><?= __('Pret') ?></th>
        <td><?= $this->Number->format($product->price) ?></td>
    </tr>
    <tr>
        <th><?= __('Greutate') ?></th>
        <td><?= $this->Number->format($product->weight) ?></td>
    </tr>
    <tr>
        <th><?= __('Cantitate') ?></th>
        <td><?= $this->Number->format($product->quantity) ?></td>
    </tr>
    <tr>
        <th><?= __('Creat') ?></th>
        <td><?= h($product->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modificat') ?></th>
        <td><?= h($product->modified) ?></td>
    </tr>
    <tr>
        <th><?= __('Activ') ?></th>
        <td><?= $product->active; ?></td>
    </tr>
</table>

<br />
<br />


<h3>Actiuni</h3>

<?= $this->Html->link('Modificare Produs', ['action' => 'edit', $product->id], ['class' => 'btn btn-default']); ?>
<?= $this->Form->postLink('Stergere Produs', ['action' => 'delete', $product->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>

<br />
<br />


<h4>Optiuni de produs</h4>

<?php if (!empty($product->productoptions)): ?>
    <table class="table-striped table-bordered table-condensed table-hover">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Id Produs') ?></th>
            <th><?= __('Id Atribut') ?></th>
            <th><?= __('Nume') ?></th>
            <th><?= __('Pret') ?></th>
            <th><?= __('Pret Prefix') ?></th>
            <th><?= __('Activ') ?></th>
            <th class="actions">Actiuni</th>
        </tr>
        <?php foreach ($product->productoptions as $productoptions): ?>
            <tr>
                <td><?= h($productoptions->id) ?></td>
                <td><?= h($productoptions->product_id) ?></td>
                <td><?= h($productoptions->attribute_id) ?></td>
                <td><?= h($productoptions->name) ?></td>
                <td><?= h($productoptions->price) ?></td>
                <td><?= h($productoptions->price_prefix) ?></td>
                <td><?= h($productoptions->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link('Vizualizare', ['controller' => 'Productoptions', 'action' => 'view', $productoptions->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?= $this->Html->link('Modificare', ['controller' => 'Productoptions', 'action' => 'edit', $productoptions->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?= $this->Form->postLink(__('Stergere'), ['controller' => 'Productoptions', 'action' => 'delete', $productoptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productoptions->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
