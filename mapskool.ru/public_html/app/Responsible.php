<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = ['surname', 'name', 'patronymic', 'telephone'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        $keys = ['surname', 'name', 'patronymic', 'telephone'];
        for ($i = 0; $i < count($fields); $i += 4)
        {
            $treeElem = array_slice($fields, $i, 4);
            $res[] = array_combine($keys, $treeElem);
        }
        return $res;
    }

    public static function edit($fields)
    {
        $keys = ['surname', 'name', 'patronymic', 'telephone'];
        for ($i = 0; $i < count($fields); $i += 4)
        {
            $treeElem = array_slice($fields, $i, 4);
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
