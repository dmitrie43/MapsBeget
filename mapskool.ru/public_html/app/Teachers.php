<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teachers extends Model
{

    protected $fillable = ['surname', 'name', 'patronymic'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['surname', 'name', 'patronymic'];
            for ($i = 0; $i < count($fields); $i += 3)
            {
                $treeElem = array_slice($fields, $i, 3);
                $res[] = array_combine($keys, $treeElem);
            }
            return $res;
        } else return array();
    }


    public static function edit($fields)
    {
        if ($fields[0] != null) {
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
        } else return array();
    }

    public function remove()
    {
        $this->delete();
    }
}
