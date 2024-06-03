<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

        if (request()->isMethod('post')) {
            return [
                'total_payment' => 'required|numeric|min:0',
                'customer' => 'required|exists:customers,id',
                'status' => 'nullable|string',
                'registeredby' => 'nullable|string',
                'ordersdetails.*.quantity' => 'required|integer|min:1',
                'ordersdetails.*.subtotal' => 'required|numeric|min:0',
                'ordersdetails.*.product_id' => 'required|exists:products,id',
                'ordersdetails.*.registeredby' => 'nullable|string'
            ];
        }  elseif (request()->isMethod('PUT')) {
            return [
                'total_payment' => 'required|numeric|min:0',
                 'customer' => 'required|exists:customers,id',
                'status' => 'nullable|string',
                'registeredby' => 'nullable|string',
                'ordersdetails.*.quantity' => 'required|integer|min:1',
                'ordersdetails.*.subtotal' => 'required|numeric|min:0',
                'ordersdetails.*.product_id' => 'required|exists:products,id',
                'ordersdetails.*.registeredby' => 'nullable|string'
            ];
        }
    }
}
