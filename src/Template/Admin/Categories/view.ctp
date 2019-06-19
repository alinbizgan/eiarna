<h3><?= h($category->name) ?></h3>

<table class="table-striped table-bordered table-condensed table-hover">
    <tr>
        <th><?= __('Id') ?></th>
        <td><?= $this->Number->format($category->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Nume') ?></th>
        <td><?= h($category->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Slug') ?></th>
        <td><?= h($category->slug) ?></td>
    </tr>
    <tr>
        <th><?= __('Descriere') ?></th>
        <td><?= h($category->description) ?></td>
    </tr>
    <tr>
        <th><?= __('Indice sortare') ?></th>
        <td><?= $this->Number->format($category->sort) ?></td>
    </tr>
    <tr>
        <th><?= __('Activ') ?></th>
        <td><?= $this->Number->format($category->active) ?></td>
    </tr>
    <tr>
        <th><?= __('Creat') ?></th>
        <td><?= h($category->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modificat') ?></th>
        <td><?= h($category->modified) ?></td>
    </tr>
</table>

<br />

<h3>Actiuni</h3>

<?= $this->Html->link('Modificare Categorie', ['action' => 'edit', $category->id], ['class' => 'btn btn-default']); ?>
<?= $this->Form->postLink('Stergere Categorie', ['action' => 'delete', $category->id], ['class' => 'btn btn-danger', 'confirm' => __('Sunteti sigur(a) ca vreti sa stergeti # {0}?', $category->id)]) ?>

<br />
<br />
<br />
<br />

<h4>Produse din categorie</h4>
<?php if (!empty($category->products)): ?>
    <table class="table-striped table-bordered table-condensed table-hover">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Id Categorie') ?></th>
            <th><?= __('Slug') ?></th>
            <th><?= __('Nume') ?></th>
            <th><?= __('Descriere') ?></th>
            <th><?= __('Imagine') ?></th>
            <th><?= __('Pret') ?></th>
            <th><?= __('Greutate') ?></th>
            <th><?= __('Cantitate') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Creat') ?></th>
            <th><?= __('Modificat') ?></th>
            <th class="actions"><?= __('Actiuni') ?></th>
        </tr>
        <?php foreach ($category->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->category_id) ?></td>
                <td><?= h($products->slug) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->image) ?></td>
                <td><?= h($products->price) ?></td>
                <td><?= h($products->weight) ?></td>
                <td><?= h($products->quantity) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Vizualizare'), ['controller' => 'Products', 'action' => 'view', $products->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?= $this->Html->link(__('Modificare'), ['controller' => 'Products', 'action' => 'edit', $products->id], ['class' => 'btn btn-default btn-xs']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>