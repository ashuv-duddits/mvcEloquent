<?php
namespace App\controllers;

use App\Core\BaseController as BaseController;
use \Illuminate\Database\Schema\Blueprint;
use \Illuminate\Database\Capsule\Manager as Capsule;
use App\models\Category as Category;
use App\models\Product as Product;

class RandomController extends BaseController
{
    public function migrationAction($requestController)
    {
        Capsule::schema()->dropIfExists('products');

        Capsule::schema()->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('category_id')->unsigned();
        });

        Capsule::schema()->dropIfExists('category');

        Capsule::schema()->create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
        });
        return $this->render($requestController, 'migration');
    }

    public function populateAction($requestController)
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<10; $i++) {
            $category = new Category();
            $category->name = $faker->name;
            $category->save();
        }

        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i=0; $i<3; $i++) {
                $product = new Product();
                $product->name = $faker->name;
                $product->category_id = $category->id;
                $product->save();
            }
        }
        $products = Product::all();
        return $this->render($requestController, 'populate', ['categories' => $categories, 'products' => $products]);
    }
}
