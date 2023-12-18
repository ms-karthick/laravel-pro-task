<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'invoice_number' => 'required',
        'invoice_date'   => 'required',
        'customer_name'  => 'required|string|max:100',
        'customer_email' => 'required|string|max:100',
        'customer_phone' => 'required|max:10',
        'customer_state' => 'required|string|max:100',
        'product_id'     => 'required',
        'quantity'      => 'required',
        'total_cost'    => 'required',
        'gst_percentage' => 'required',
        'gst_amount'    => 'required'
        ];
    }
}
