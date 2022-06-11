<?php

namespace App\Models;

use App\Http\Controllers\Admin\DataMustahikController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_data_mustahik extends Model
{
    use HasFactory;


    protected $fillable = [
        'head_name',
        'occupation',
        'data_mustahik_id',
        'identity_number',
        'gender'
    ];

    /**
     *  data mustahik
     *
     * @return void
     */
    public function data_mustahik(){

    return $this->belongsTo(Data_mustahik::class);


    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }


    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

}
