<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Area extends Model
{
    protected $fillable = ['name'];

    public function organization() {
//        DB::select(DB::raw("SELECT id FROM areas WHERE id = {$name}"));
        return $this->hasOne(Organization::class, 'area_id');
    }
}
