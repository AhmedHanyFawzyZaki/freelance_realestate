<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

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
    protected $fillable = ['title', 'content', 'title_ar', 'content_ar', 'title_sp', 'content_sp'];

    public function getTitle()
    {
        $att = 'title';
        $locale = \App::getLocale();
        $field = $locale=='en'? $att : $att . '_' . $locale;
        return \Schema::hasColumn($this->table, $field)? $this->$field : $this->$att;
    }
    public function getContent()
    {
        $att = 'content';
        $locale = \App::getLocale();
        $field = $locale=='en'? $att : $att . '_' . $locale;
        return \Schema::hasColumn($this->table, $field)? $this->$field : $this->$att;
    }
}
