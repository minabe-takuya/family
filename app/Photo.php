<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['pic1', 'pic2', 'pic3', 'comment', 'user_id'];
    // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
    // protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
