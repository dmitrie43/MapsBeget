<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    protected $fillable = ['description'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public static function add($fields)
    {
        if (!empty($fields)) {
            $data[] = $fields;
            $keys = ['description'];
            $res[] = array_combine($keys, $data);
            return $res;
        } else return array();
//        if(!empty($fields)) {
//            $data = new static;
//            $data->fill($fields);
//            $data->save();
//            return $data;
//        } else return array();
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