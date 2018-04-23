<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cover_image', 'main_image', 'price', 'name', 'name_ar', 'name_sp', 'description', 'description_ar', 'description_sp', 'introduction', 'introduction_ar', 'introduction_sp'];

    public function getName()
    {
        $att = 'name';
        $locale = \App::getLocale();
        $field = $locale=='en'? $att : $att . '_' . $locale;
        return \Schema::hasColumn($this->table, $field)? $this->$field : $this->$att;
    }
    public function getDescription()
    {
        $att = 'description';
        $locale = \App::getLocale();
        $field = $locale=='en'? $att : $att . '_' . $locale;
        return \Schema::hasColumn($this->table, $field)? $this->$field : $this->$att;
    }
    public function getIntroduction()
    {
        $att = 'introduction';
        $locale = \App::getLocale();
        $field = $locale=='en'? $att : $att . '_' . $locale;
        return \Schema::hasColumn($this->table, $field)? $this->$field : $this->$att;
    }
}
