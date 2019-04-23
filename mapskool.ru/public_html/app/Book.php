<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['author', 'name', 'publish', 'year'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['author', 'name', 'publish', 'year'];
            for ($i = 0; $i < count($fields); $i += 4)
            {
                $treeElem = array_slice($fields, $i, 4);
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
