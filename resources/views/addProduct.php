<?php
$title = "Ajouter Produit";
ob_start();
?>
    <form action="index.php?action=products/store" method="post">
        <div class="form-group">
            <label>Label</label>
            <input type="text" class="form-control" name="label" placeholder="Label">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" placeholder="Price">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add</button>
    </form>
<?php
$content = ob_get_clean();
include_once 'layout.php';
