<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Director;
use PhpParser\Node\Scalar\MagicConst\Dir;

class Organization extends Model
{
    use Sluggable;

    protected $fillable = ['nameOrganization', 'area_id', 'statusOrganization',
        'numberDocumentation', 'reduction'];

//    public function culture()
//    {
//        return $this->hasMany(Culture::class, 'culture_id');
//    }
//
//    public function Event()
//    {
//        return $this->hasMany(Event::class, 'event_id');
//    }

    public function director()
    {
        return $this->hasOne(Director::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function responsible()
    {
        return $this->hasOne(Responsible::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teachers::class);
    }

    public function museums()
    {
        return $this->hasMany(Museums::class);
    }

    public function cabinets()
    {
        return $this->hasMany(Cabinets::class);
    }

    public function others()
    {
        return $this->hasMany(Others::class);
    }

    public function additionalInfo()
    {
        return $this->hasOne(AdditionalInfo::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function collective()
    {
        return $this->hasMany(Collective::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function methodolog()
    {
        return $this->hasMany(Methodolog::class);
    }

    public function openClassroom()
    {
        return $this->hasMany(OpenClassroom::class);
    }

    public function society()
    {
        return $this->hasMany(Society::class);
    }

    public function subjectStudy()
    {
        return $this->hasMany(SubjectStudy::class);
    }

    public static function add($fields)
    {
        $data = new static;
        $data->fill($fields);
        $data->save();
        return $data;
    }

    public function sluggable()
    {
       return [
           'slug' => [
               'source' => 'nameOrganization'
           ]
       ];
    }

    public function edit($fields)
    {
        $this->setUpdatedAt(date("Y-m-d H:i:s"));
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
