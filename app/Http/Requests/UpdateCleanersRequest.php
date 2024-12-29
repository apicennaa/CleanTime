<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCleanersRequest extends FormRequest
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
        // $dosenid = $this->route('dosen')->id;
        return [
            'kode_dosen' => 'required|string|max:3',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens,nip,' . $this->route('dosen'),
            'email' => 'required|email',
            'no_telepon' => 'nullable|string',
        ];
    }
}
