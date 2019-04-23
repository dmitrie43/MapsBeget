<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable = ['surname', 'name', 'patronymic'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        $keys = ['surname', 'name', 'patronymic'];
        for ($i = 0; $i < count($fields); $i += 3)
        {
            $treeElem = array_slice($fields, $i, 3);
            $res[] = array_combine($keys, $treeElem);
        }
        return $res;
    }

    public static function edit($fields)
    {
        $keys = ['surname', 'name', 'patronymic'];
        for ($i = 0; $i < count($fields); $i += 3)
        {
            $treeElem = array_slice($fields, $i, 3);
            $res[] = array_combine($keys, $treeElem);
        }
        $arres = [];
        foreach ($res as $subres) {
            foreach ($subres as $key => $val) {
                $arres[$key] = $val;
            }
        }
        return $arres;
    }

    public function remove()
    {
        $this->delete();
    }
}
