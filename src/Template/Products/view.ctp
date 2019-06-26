<?php
$title_for_layout = $product->name;
$description = $product->name;
$keywords = $product->name;
$this->set(compact('title_for_layout', 'description', 'keywords'));
?>

<?php $this->Html->addCrumb('Shop', ['controller' => 'products', 'action' => 'index', '_full' => true]); ?>
<?php $this->Html->addCrumb($product->category->name, ['controller' => 'categories', 'action' => 'view', $product->category->slug, '_full' => true]); ?>
<?php $this->Html->addCrumb($product->name, ['controller' => 'products', 'action' => 'view', $product->slug, '_full' => true]); ?>

<br />
<br />

<div itemscope itemtype="http://schema.org/Product">
    <h1 itemprop="name"><?php echo $product->name; ?></h1>
    <hr/>
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="easyzoom easyzoom--overlay">
                <a href="/eiarna/images/products/<?php echo $product->image ?>">
                    <?php echo $this->Html->image('/images/products/' . $product->image, ['class' => 'img-fluid img-thumbnail', 'alt' => $product->name, 'itemprop' => 'image']); ?>
                </a>
            </div>


            <br />
            <br />

            <div class="row">
                <div class="col-md-6">
                    Rating Produs: <div id="rateYoProductRating"></div>
                    <?php echo $this->Form->input('productrating', ['type' => 'hidden', 'value' => $product->average_rating]); ?>
                    <small>Nota: <?php echo $product->average_rating ?> din <?php echo $product->average_rating_count ?> recenzii</small>
                </div>
                <div class="col-md-6">
                    <small>Categorie: <?php echo $this->Html->link($product->category->name, ['controller' => 'categories',  'action' => 'view', $product->category->slug]); ?></small>
                    <br />

                    <small>Greutate: <?php echo $product->weight; ?> kg</small>
                </div>
            </div>


            <br />
            <br />
        </div>
        <div class="col-md-8 col-sm-12">

            <?php echo $this->Form->create(NULL, ['url' => ['controller' => 'products', 'action' => 'add']]); ?>
            <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $product->id]); ?>

            <?php if(!empty($productoptionlists)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <?php if(!empty($productoptions)): ?>
                            <?php echo $this->Form->input('productoptionlist', ['label' => false, 'class' => 'form-control']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <br />
                <input type="hidden" id="modselected" value="" />

            <?php endif;?>

            <div class="row" style="padding:50px">
                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="col-sm-6">
                    <strong>
                        <span itemprop="priceCurrency" id="pricecurrency" content="RON">Pret: </span>
                        <span id="price" itemprop="price" content="<?php echo number_format($product->price, 2); ?>">
                        <?php echo number_format($product->price, 2); ?> RON</span>
                    </strong>

                    <link itemprop="availability" href="http://schema.org/InStock" />
                </div>
                <div  class="col-sm-6 pull-right">
                    <?php if($product->quantity > 0) { ?>
                        <?php echo $this->Form->button('<i class="fa fa-cart-plus"></i> &nbsp; Adauga la cart', ['class' => 'btn btn-success btn-sm', 'id' => 'addtocart', 'escape' => false]);?>
                    <?php } else { ?>
                        <i class="fa fa-ban"></i> Stoc indisponibil
                    <?php } ?>
                </div>
            </div>

            <?php echo $this->Form->end(); ?>

            <br />

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descriere</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab" aria-controls="rating" aria-selected="false">Recenzii</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="crosssale-tab" data-toggle="tab" href="#crosssale" role="tab" aria-controls="crosssale" aria-selected="false">Produse asemanatoare</a>
              </li>
            </ul>
            <br/>
            <div class="tab-content" id="myTabContent" style="padding:10px;">
              <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p itemprop="description" style="text-align: justify"><?php echo $product->description; ?></p>
              </div>
              <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">
                    <?php echo $this->Form->create(NULL, ['url' => ['controller' => 'productrating', 'action' => 'add']]); ?>
                        <?php echo $this->Form->input('product_id', ['type' => 'hidden', 'value' => $product->id]); ?>
                        <div class="container">
                            <div class="row">
                                <?php $i = 0; foreach ($productrating as $rating): $i++;?>
                                    <div class="col-md-12">
                                        <div class="row border m-2 p-2 ">
                                            <div class="col-sm-8">
                                                <?php echo $rating->name; ?> - <small><?php echo $rating->created->format('d/m/Y'); ?></small>
                                            </div>
                                            <div class="col-sm-4 pull-right">
                                                <div id="field-rating<?php echo $i; ?>"></div>
                                                <?php echo $this->Form->input('rating', ['type' => 'hidden', 'id' => 'rating'.$i, 'value' =>  $rating->rating]); ?>
                                            </div>
                                            <div class="col-sm-12">
                                                <small><?php echo $rating->description; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="row border m-2 p-3 ">
                                <div class="col-sm-12 mb-4">
                                    <b>Adaugati recenzie</b>
                                </div>
                                <div class="col-sm-4">
                                    <p>Nume</p>
                                </div>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->input('name', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                                </div>
                                <div class="col-sm-4 p-2">
                                    <p>Nota produs</p>
                                </div>
                                <div class="col-sm-8 p-2">
                                    <div id="rateYoAddRating"></div>
                                    <?php echo $this->Form->input('rating', ['type' => 'hidden', 'id' => 'rating', 'value' => '0']); ?>
                                </div>
                                <div class="col-sm-4">
                                    <p>Descriere Recenzie</p>
                                </div>
                                <div class="col-sm-8">
                                    <?php echo $this->Form->input('description', ['required' => true, 'class' => 'form-control', 'label' => false, 'rows' => 3]); ?>
                                </div>
                                <div class="col-sm-12 pull-right pt-4">
                                    <?php echo $this->Form->button('Adauga Recenzie', ['class' => 'btn btn-primary']); ?>
                                </div>
                            </div>

                        </div>
                    <?php echo $this->Form->end(); ?>
              </div>
              <div class="tab-pane fade" id="crosssale" role="tabpanel" aria-labelledby="crosssale-tab">
                <div class="row">
                    <?php foreach ($productcrosssalelist as $product): ?>
                    <div class="col-4">
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



            <br />
            <br />
        </div>
    </div>


</div>

<input type="hidden" id="product_price" name="product_price" value="<?php echo sprintf('%01.2f', $product->price); ?>" />

<br />
