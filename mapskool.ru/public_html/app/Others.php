<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    protected $fillable = ['description'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['description'];
            for ($i = 0; $i < count($fields); $i ++)
            {
                $treeElem = array_slice($fields, $i, 1);
                $res[] = array_combine($keys, $treeElem);
            }
            return $res;
        } else return array();
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
