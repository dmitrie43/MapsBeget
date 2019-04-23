<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenClassroom extends Model
{
    protected $fillable = ['description', 'class', 'head'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['description', 'class', 'head'];
            for ($i = 0; $i < count($fields); $i += 3)
            {
                $treeElem = array_slice($fields, $i, 3);
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
