

<?php 
//v_product
$i = 0;
foreach($product_photo as $pp) { ?>
<li data-target="#carousel-example-generic-<?= $p['id'] ?>" data-slide-to="<?= $pp['id']; ?>" class="<?php if($i == 0) { echo 'active';} ?>"></li>
<?php $i++; } ?>