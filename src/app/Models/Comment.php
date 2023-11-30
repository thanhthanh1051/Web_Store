<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Comment extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name',
    //     'description',
    // ];

    protected $table = 'comments';
    public function addComment($data){
        return DB::table($this->table)
        ->insert($data);
    }
}
