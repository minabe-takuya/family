<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['category_id', 'from_date', 'to_date', 'comment', 'user_id'];
    // モデルからその属性が取り除かれる（カラムが増えてもほとんど変更しなくて良い）
    // protected $guarded = ['id'];
    public static function paginate(int $int)
    {
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //下２つを追加した
//    public function _Category(){
//        return $this->belongsTo('App\_Category');
//    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public static function getDate($from_date,$to_date){
        $date = Event::whereBetween("from_date",[$from_date,$to_date])->get();
//       $date = Event::where($from_date and $to_date)->get();
        return $date;
    }


}
