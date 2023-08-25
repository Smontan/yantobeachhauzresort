<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use Illuminate\Foundation\Http\FormRequest;

class CheckinDateFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'check_in' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $roomId = $this->input('room_id');
                    $checkOutDate = $this->input('check_out');

                    $reservations = Reservation::where('rooms_id', $roomId)
                        ->whereIn('status', ['pending', 'confirmed', 'check_in'])
                        ->where(function($query) use ($value, $checkOutDate) {
                            $query->whereBetween('check_in', [$value, $checkOutDate])
                                ->orWhereBetween('check_out', [$value, $checkOutDate])
                                ->orWhere(function($query) use ($value, $checkOutDate) {
                                    $query->where('check_in', '<', $value)
                                        ->where('check_out', '>', $checkOutDate);
                                });
                        })
                        ->get();

                    if ($reservations->count() > 0) {
                        $fail('The selected check-in date is not available for this room.');
                    }
                }
            ]
        ];
    }

}
