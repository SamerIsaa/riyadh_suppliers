<?php

namespace App\Model;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class BankAccount extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = self::FILLABLE;

    const FILLABLE = [
        'iban', 'number', 'owner_name', 'is_active', 'soft'
    ];
    public $translatedAttributes = ['bank_name'];
    public $translationModel = BankAccountTranslation::class;


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
                $q->where('bank_name', 'like', '%' . $query['generalSearch'] . '%');
            })->orWhere('iban', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('owner_name', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('number', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('soft', 'like', '%' . $query['generalSearch'] . '%');
        }

        return $q;
    }
}
