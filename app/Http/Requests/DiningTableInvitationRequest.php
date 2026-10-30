<?php

namespace App\Http\Requests;

use App\Models\DiningTable;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DiningTableInvitationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        /** @var DiningTable $diningTable */
        $diningTable = $this->route('diningTable');

        return [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                function (string $attribute, mixed $value, Closure $fail) use ($diningTable) {
                    $user = User::where('email', $value)->first();

                    if ($user && $diningTable->hasMember($user)) {
                        $fail('The invited user is already a member of this dining table.');
                    }
                },
            ],
        ];
    }
}
