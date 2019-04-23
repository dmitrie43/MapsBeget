<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Cabinets extends Model
{
    protected $fillable = ['description', 'head'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['description', 'head'];
            for ($i = 0; $i < count($fields); $i += 2)
            {
                $treeElem = array_slice($fields, $i, 2);
                if ($treeElem[0] == null) {
                    continue;
                }
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
