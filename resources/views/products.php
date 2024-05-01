<?php
$title = "Liste des Produits";
ob_start();
?>
    <a href="index.php?action=products/create" class="btn btn-primary">Add Product</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Label</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php /** @var \app\models\Product[] $data */
        foreach ($data as $product): ?>
            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getLabel() ?></td>
                <td><?= $product->getPrice() ?> $</td>
                <td>
                    <a href="index.php?action=products/edit&id=<?php echo $product->getId() ?>" class="btn btn-success btn-sm">Modifier</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer le produit <?= $product->getLabel() ?>');" href="index.php?action=products/destroy&id=<?php echo $product->getId() ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
$content = ob_get_clean();
include_once 'layout.php';

