<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    protected $primaryKey = 'Fid';

    protected $table = 't_test';

    public $timestamps = false;

    protected $fillable = ['Ftype', 'Fname'];

    public function page($size)
    {
        if($size <= 0){
            $size = 10;
        }
        return DB::table($this->table)->paginate($size);
    }
}
