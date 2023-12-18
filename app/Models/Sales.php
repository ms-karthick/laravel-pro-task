<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $appends = ['product_name'];

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_state',
        'product_id',
        'category_id',
        'quantity',
        'total_cost',
        'gst_percentage',
        'gst_amount'
    ];

  
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getProductNameAttribute(){
        return $this->product()->first() ? $this->product()->first()->product_name : '';
    }

}
