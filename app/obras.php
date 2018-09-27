<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obras extends Model
{
    protected $fillable = ['nome','resumo','editora', 'num_exemplares'];

}
