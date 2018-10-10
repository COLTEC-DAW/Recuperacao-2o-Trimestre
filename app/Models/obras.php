<?php
namespace App\Moldels;

use Illuminate\Database\Eloquent\Model;

class obras extends Model

{
    protected $table = 'obras';
    protected $fillable = ['nome', 'resumo', 'autor', 'editora', 'exemplares'];
    public $timestamps = false;
}
