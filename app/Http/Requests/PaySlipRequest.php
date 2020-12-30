<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaySlipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_urut' => 'required',
            'employee_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required',
            'total_lembur' => 'required',
            'potongan' => 'required',
            'gaji_bersih' => 'required',
        ];
    }
}
