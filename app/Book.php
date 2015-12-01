<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 01/12/2015
 * Time: 13:00
 */

namespace App;


use Guzzle\Service\Resource\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['id', 'ISBN', 'name', 'author', 'publisher', 'supplier', 'category', 'realese', 'stok'];
}