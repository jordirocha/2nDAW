<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
//    protected $primaryKey = 'id';
//    protected $keyType = 'int';

     //protected $table = 'comments';
    public function users(){
        return $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        'comment',
    ];

   // protected $guarded = [];
}
