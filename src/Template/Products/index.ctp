<?php
$title_for_layout = 'eIarna magazin online';
$description = 'eIarna magazin online';
$keywords = 'eIarna magazin online';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<div class="row">
    <div class="col-6">
        <h1>eIarna magazin online</h1>
    </div>
    <div class="col-6 pull-right">
        <?php echo $this->Form->create(NULL, ['url' => ['controller' => 'products', 'action' => '/']]); ?>
        <div class="row"><div class="col-sm-10">
            <?php echo $this->Form->input('search', ['class' => 'form-control', 'label' => false]); ?>
        </div>
        <div class="col-sm-2">
            <?php echo $this->Form->button('Cauta', ['class' => 'btn btn-primary']); ?>
        </div></div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<br />

<?php if(isset($search)) { ?>
    Rezultatele cautarii dupa: <b><?php echo htmlspecialchars($search); ?></b><br/>
<?php } ?>

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

<?php if(!isset($search)) { ?>
<?php echo $this->element('pagination'); ?>
<?php  } ?>

<br />
<br />
