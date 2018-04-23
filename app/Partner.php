<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partners';

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
    protected $fillable = ['image', 'name', 'description', 'name_ar', 'description_ar', 'name_sp', 'description_sp'];

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
}
