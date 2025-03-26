<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

/**
 * @bodyParam name string required The name of the product Example: Monkey King Wukong
 * @bodyParam category string required The category of the product Example: game
 * @bodyParam status string required An integer representing status Enum: active,inactive
 */
class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "max:255"],
            "category" => ["required", "string", "max:255"],
            "status" => ["required", new EnumRule(StatusEnum::class)]
        ];
    }
}
