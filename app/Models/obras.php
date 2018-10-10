<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class obras extends Model

{
    protected $table = 'obras';
    protected $fillable = ['nome', 'resumo', 'autor', 'editora', 'exemplares'];
    public $timestamps = false;
}
