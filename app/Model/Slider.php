<?php

namespace App\Model;

use App\Traits\CreateTranslationTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Slider extends Model
{
    use Translatable, SoftDeletes;

    const FILLABLE = ['image', 'mobile_image', 'is_active'];
    public $translatedAttributes = ['title', 'content'];
    public $translationModel = SliderTranslation::class;

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

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {

            $q->whereHas('translations', function ($q) use ($query) {
                $q->where('title', 'like', "%{$query['generalSearch']}%")
                    ->orWhere('content', 'like', "%{$query['generalSearch']}%");
            });

        }

        return $q;
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }
}
