<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 01/12/2015
 * Time: 13:00
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['ISBN', 'name', 'author', 'publisher', 'supplier', 'category', 'release', 'price','stock'];

    public $timestamps = false;
}