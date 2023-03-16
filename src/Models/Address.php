<?php

namespace RedJasmine\Address\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RedJasmine\Support\Traits\HasDateTimeFormatter;

class Address extends Model
{
    use HasDateTimeFormatter;

    use SoftDeletes;
    protected $table = 'address';


    protected $fillable = [
        'contacts', 'mobile',
        'country', 'province', 'city', 'district', 'street',
        'country_id', 'province_id', 'city_id', 'district_id', 'street_id',
        'address', 'zip_code', 'sort', 'tag', 'zip_code', 'remarks'
    ];

    protected $appends =[
        'full_address'
    ];


    public function fullAddress() : Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => implode([ $attributes['province'], $attributes['city'], $attributes['district'], $attributes['street'], $attributes['address'] ])
        );

    }
}