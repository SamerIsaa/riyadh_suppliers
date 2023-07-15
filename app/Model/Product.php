<?php

namespace App\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{

    use Translatable, SoftDeletes;

    public $translatedAttributes = ['title', 'description'];
    public $translationModel = ProductTranslation::class;
    const FILLABLE = ['number', 'is_active', 'is_featured', 'image', 'price', 'offer_price'];
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

        $query = request('query');
        if (isset($query['generalSearch'])) {
            $q->whereTranslationLike('title', "%{$query['generalSearch']}%")->orWhereTranslationLike('description', "%{$query['generalSearch']}%");
        }
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function scopeFeatured($q)
    {
        return $q->where('is_featured', 1);
    }

    public function scopeNotFeatured($q)
    {
        return $q->where('is_featured', false);
    }

}
