<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//untuk bagian di databsenya
class Institutions extends Model
{
    protected $table ='institutions';
    protected $fillable =['name','description'];
}
