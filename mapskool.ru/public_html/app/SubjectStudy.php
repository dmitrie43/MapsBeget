<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectStudy extends Model
{
    protected $fillable = ['title', 'level'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if ($fields[0] != null) {
            $keys = ['title', 'level'];
            for ($i = 0; $i < count($fields); $i += 2)
            {
                $treeElem = array_slice($fields, $i, 2);
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
