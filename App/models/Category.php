<?php
namespace App\models;

class Category extends \Illuminate\Database\Eloquent\Model
{
    public $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;
}
