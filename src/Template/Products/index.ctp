<?php
$title_for_layout = 'eIarna magazin online';
$description = 'eIarna magazin online';
$keywords = 'eIarna magazin online';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<h1>eIarna magazin online</h1>

<br />
<br />

<div class="row">
    <div class="col-12">
        <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card">
                <div class="card-body">
                    <?php echo $this->Html->image('/images/small/' . $product->image, ['fullBase' => true, 'url' => ['action' => 'view', $product->slug, '_full' => true], 'alt' => $product->name, 'class' => 'img-fluid shopimage1']); ?>

                </div>
                <div class="card-footer shopfooter1">
                    <?php echo $this->Html->link($product->name, ['action' => 'view', $product->slug, '_full' => true]); ?>

                    <br />
                </div>
            </div>
            <br />
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<?php echo $this->element('pagination'); ?>

<br />
<br />
