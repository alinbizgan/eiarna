<h3>Produse</h3>

<?php echo $this->element('pagination'); ?>

<table class="table-striped table-bordered table-sm table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id', 'Id') ?></th>
            <th><?= $this->Paginator->sort('id', 'Poza') ?></th>
            <th><?= $this->Paginator->sort('category_id', 'Id Categorie') ?></th>
            <th><?= $this->Paginator->sort('name', 'Nume') ?></th>
            <th><?= $this->Paginator->sort('slug') ?></th>
            <th><?= $this->Paginator->sort('image', 'Nume fisier poza') ?></th>
            <th><?= $this->Paginator->sort('price', 'Pret') ?></th>
            <th><?= $this->Paginator->sort('quantity', 'Stoc (bucati)') ?></th>
            <th><?= $this->Paginator->sort('active', 'Activ') ?></th>
            <th class="actions">Actiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><img src="<?php echo $this->Url->assetUrl('/images/products/'.$product->image); ?>" class="img-fluid" width="80"></td>
                <td><span class="category_id" data-value="<?php echo $product->category_id; ?>" data-pk="<?php echo $product->id; ?>"><?php echo $product->category->name; ?></span></td>
                <td><span class="name" data-value="<?php echo $product->name; ?>" data-pk="<?php echo $product->id; ?>"><?php echo $product->name; ?></span></td>
                <td><span class="slug" data-value="<?php echo $product->slug; ?>" data-pk="<?php echo $product->id; ?>"><?php echo $product->slug; ?></span></td>
                <td><?= h($product->image) ?></td>
                <td><span class="price" data-value="<?php echo $product->price; ?>" data-pk="<?php echo $product->id; ?>"><?php echo $product->price; ?></span></td>
                <td><?= h($product->quantity) ?></td>
                <td><?php echo $this->Html->link($this->Html->image('icon_' . $product->active . '.png'), ['controller' => 'products', 'action' => 'toggle', 'active', $product->id], ['class' => 'toggle', 'escape' => false]); ?></td>
                <td class="actions">
                    <?= $this->Html->link('Vizualizare', ['action' => 'view', $product->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?= $this->Html->link('Modificare', ['action' => 'edit', $product->id], ['class' => 'btn btn-default btn-xs']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br />

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actiuni</h3>

<?php echo $this->Html->link('Produs nou', ['action' => 'add'], ['class' => 'btn btn-default']) ?>

<br />
<br />
