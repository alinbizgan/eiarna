<h3>Optiuni de produs</h3>

<?php echo $this->element('pagination'); ?>

<table class="table-striped table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('base_product_id', 'Produs de Baza') ?></th>
            <th><?= $this->Paginator->sort('cross_sale_product_id', 'Produs Asociat') ?></th>
            <th class="actions">Actiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productcrosssales as $productcrosssale): ?>
            <tr>
                <td><?= $this->Number->format($productcrosssale->id) ?></td>
                <td><?= $productcrosssale->has('base_product_id') ? $this->Html->link($productcrosssale->BaseProduct->name, ['controller' => 'Products', 'action' => 'view', $productcrosssale->BaseProduct->id]) : '' ?></td>
                <td><?= $productcrosssale->has('base_product_id') ? $this->Html->link($productcrosssale->CrossProduct->name, ['controller' => 'Products', 'action' => 'view', $productcrosssale->CrossProduct->id]) : '' ?></td>

                <td class="actions">
                    <?php echo $this->Form->postLink('Stergere', ['action' => 'delete', $productcrosssale->id], ['class' => 'btn btn-default btn-xs','confirm' => __('Sunteti sigur ca vreti sa stergeti asocierea # {0}?', $productcrosssale->id)]) ?>
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

<?php echo $this->Html->link('Asociere de produs noua', ['action' => 'add'], ['class' => 'btn btn-default']) ?>

<br />
<br />
