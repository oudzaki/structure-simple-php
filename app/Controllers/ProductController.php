<?php

namespace app\Controllers;

use app\models\Product;

class ProductController extends BaseController
{
    /**
     * @return Product
     */
    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Product();
        }
        return static::$model;
    }


    public static function indexAction()
    {
        // Modele ( Les donnees) les voitures
        // $products = static::getModel()->latest();

        $model = new Product();
        $products = $model->latest();

        // View (afficher les données)
        static::view("products", $products);
    }

    public static function createAction()
    {
        static::view('addProduct');
    }

    public static function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created = static::getModel()
                ->setLabel($_POST['label'])
                ->setPrice($_POST['price'])
                ->create();
            if ($created === true) {
                static::redirect('products');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function editAction()
    {
        // static::view('editProduct', self::getModel()::view($_GET['id']));
        $model = new Product();
        static::view('editProduct', $model::view($_GET['id']));
    }

    public static function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updated = static::getModel()
                ->setLabel($_POST['label'])
                ->setPrice($_POST['price'])
                ->update($_POST['id']);
            if ($updated === true) {
                static::redirect('products');
            } else {
                echo "Erreur";
            }
        }
    }

    public static function destroyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $deleted = static::getModel()
                ->destroy($_GET['id']);
            if ($deleted === true) {
                static::redirect('products');
            } else {
                echo "Erreur";
            }
        }
    }



}