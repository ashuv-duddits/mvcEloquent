<?php
namespace App\models;

class Product extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id'];
    public $timestamps = false;
}
