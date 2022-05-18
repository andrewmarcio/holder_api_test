<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            "initial_date" => "required|date|date_format:Y-m-d",
            "initial_hour" => "required|date_format:h:i",
            "final_date" => "nullable|date|date_format:Y-m-d|after_or_equal:initial_date",
            "final_hour" => "nullable|date_format:h:i|after:initial_hour",
            "description" => "required|string"
        ];
    }
}
