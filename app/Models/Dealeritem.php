<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealeritem extends Model
{
    // use HasFactory;
    //     /**
    //  * Get the user associated with the Register
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function indexLogin(): HasOne
    // {
    //     return $this->hasOne(DealerModel::class);
    // }
    // /**
    //  * Get the user associated with the Register
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function indexAddress(): HasOne
    // {
    //     return $this->hasOne(ItemModel::class);
    // }

    protected $fillable=['di_name','di_name','di_desc','di_price','view_price','di_status','d_id','di_image'];
}
