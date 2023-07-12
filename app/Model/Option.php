<?php

namespace App\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Option extends Model
{
    use Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    public $translationModel = OptionTranslation::class;

    const FILLABLE = ['is_active','property_id'];
    protected $fillable = self::FILLABLE;


    public function createTranslation($arr)
    {
        $coll = collect($arr);
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($coll->get($attribute . '_' . $key) != null && !empty($coll->get($attribute . '_' . $key))) {
                    $this->{$attribute . ':' . $key} = $coll->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q')) {
            $q->whereTranslationLike('name', "%{$request->q}%");
        }
        $query = request('query');
        if (isset($query['generalSearch'])) {
            $q->whereTranslationLike('name', "%{$query['generalSearch']}%");
        }
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

}
