<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\HierarchyValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductionUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Asumimos autorización por ahora
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'unique:production_units,code'],
            'unit_type_id' => ['required', 'exists:unit_types,id'],
            'species_id' => ['nullable', 'exists:species,id'],
            'parent_id' => [
                'nullable',
                'exists:production_units,id',
                new HierarchyValidationRule((int) $this->unit_type_id)
            ],
            'is_active' => ['boolean'],
        ];
    }

    /**
     * Mensajes personalizados
     */
    public function messages(): array
    {
        return [
            'parent_id.exists' => 'La unidad padre seleccionada no existe en el sistema.',
            'unit_type_id.exists' => 'El tipo de unidad seleccionado no es válido.',
        ];
    }
}
