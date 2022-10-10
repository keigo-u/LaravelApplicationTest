<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    /**
     * 複数代入可能な属性
     *
     * @var array
     */
    protected $fillable = [
        'your_name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact',
    ];

    public function scopeSearch($query, $search)
    {
        if($search !== null){
            $search_split = mb_convert_kana($search, 's');  //全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split);  //空白で区切る
            foreach($search_split2 as $value) {
                $query->where('your_name', 'like', '%'.$value.'%');
            }
            return $query;
        }
    }
}
