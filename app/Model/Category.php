<?php

namespace App\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Category extends Model
{
    use Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    public $translationModel = CategoryTranslation::class;

    const FILLABLE = ['is_active'];
    protected $fillable = self::FILLABLE;


    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }

    public function scopeSearch($q)
    {
        if (\request()->filled('q')) {
            $q->whereTranslationLike('name', "%".request()->q."%");
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
