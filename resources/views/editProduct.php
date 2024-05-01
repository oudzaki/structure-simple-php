<?php
$title = "Modifier Produit";
ob_start();
?>
    <form action="index.php?action=products/update" method="post">
        <div class="form-group">
            <label>Label</label>
            <input type="hidden" value="<?= $data->getId()?>"  name="id" >

            <input type="text" value="<?= $data->getLabel()?>" class="form-control" name="label" placeholder="Label">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text"  value="<?= $data->getPrice()?>"  class="form-control" name="price" placeholder="Price">
        </div>
        <button type="submit" class="btn btn-primary my-3">Modifier</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
