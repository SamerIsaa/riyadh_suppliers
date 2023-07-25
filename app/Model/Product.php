<?php

namespace App\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{

    use Translatable, SoftDeletes;

    public $translatedAttributes = ['title', 'short_description', 'description'];
    public $translationModel = ProductTranslation::class;
    const FILLABLE = ['number', 'is_active', 'is_featured', 'image', 'images', 'price', 'offer_price', 'category_id'];
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

    public function scopeFilter($q)
    {
        if (\request()->filled('q') && \request('q') != "") {
            $q_text = \request('q');
            $q->whereTranslationLike('title', "%{$q_text}%")->orWhereTranslationLike('description', "%{$q_text}%");
        }
        if (\request()->filled('property') && \request('property') != []) {
            $props = request('property', []);

            $q->Where(function ($qq) use ($props) {
                foreach ($props as $key => $option) {
                    $qq->orWhereHas('properties', function ($qqq) use ($key, $option) {
                        return $qqq->where('property_id', $key)->whereIn('option_id', $option);
                    });
                }
            });

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function saveProps(): void
    {

        $props = request()->get('props', "{}");
        $props = json_decode($props, true);

        $ids = [];
        foreach ($props as $prop) {
            $pp = ProductProperty::query()->updateOrCreate([
                'product_id' => $this->id,
                'property_id' => $prop['property_id'],
            ], [
                'option_id' => $prop['option_id'],
            ]);
            $ids[] = $pp->id;
        }

        ProductProperty::query()->where('product_id', $this->id)->whereNotIn('id', $ids)->delete();
    }
}
