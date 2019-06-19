<script>

$(document).ready(function() {

    $('.name').editable({
        type: 'text',
        name: 'name',
        url: '/admin/categories/editable',
        title: 'Name',
        placement: 'right',
    });

});

</script>

<h3>Categorii</h3>

<?php echo $this->element('pagination'); ?>

<table class="table-striped table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id', 'Id') ?></th>
            <th><?= $this->Paginator->sort('name', 'Nume') ?></th>
            <th><?= $this->Paginator->sort('slug', 'Slug') ?></th>
            <th><?= $this->Paginator->sort('description', 'Descriere') ?></th>
            <th><?= $this->Paginator->sort('sort', 'Indice sortare') ?></th>
            <th><?= $this->Paginator->sort('active', 'Activ') ?></th>
            <th class="actions">Actiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><span class="name" data-value="<?php echo $category->name; ?>" data-pk="<?php echo $category->id; ?>"><?php echo $category->name; ?></span></td>
                <td><?= h($category->slug) ?></td>
                <td><?= h($category->description) ?></td>
                <td><?= $this->Number->format($category->sort) ?></td>
                <td><?php echo $this->Html->link($this->Html->image('icon_' . $category->active . '.png'), ['controller' => 'categories', 'action' => 'toggle', 'active', $category->id], ['class' => 'toggle', 'escape' => false]); ?></td>
                <td class="actions">
                    <?php echo $this->Html->link('Vizualizare', ['action' => 'view', $category->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?php echo $this->Html->link('Modificare', ['action' => 'edit', $category->id], ['class' => 'btn btn-default btn-xs']); ?>
                    <?php // echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]); ?>
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

<?php echo $this->Html->link('Categorie noua', ['action' => 'add'], ['class' => 'btn btn-default']) ?>

<br />
<br />