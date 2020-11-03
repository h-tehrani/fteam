<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class order extends Model
{
    protected $fillable=['customerName','customerPhone','customerEmail','productName','product_id',
        'customerDescription','orderPaid','productHost','productGuaranty','optionsPayGate','optionsEnamad','optionsCertificateR',
        'optionsResponsive','optionsMySQL','optionsAuthenticationGuard','optionsWelcomePageJquery','optionsStart','finalPrice'];

    public function users(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->belongsTo('App\Models\product');
    }


}
