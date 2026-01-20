<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointamentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    


Reacty
    public function authorize():bool {
        return true; // 
    }

    public function rules() {
        return [
            'type'           =>'required|string|max:50',
            'title'          =>'required|string|max:100',
            'description'    =>'required|string|max255',
            'date'           =>'required|datetime:m/d/Y|Before_or_equal:today',
            'hour'           =>'required|datetime:H:i',
            'status'         =>'required|string|max:30',
            'user_id'        =>'required|exists:users,id',
            'mestamp'        =>'nullable|string|max:255',
            'keycreat_at'    =>'required|datetime:m/d/Y',
        ];
    }

    public function messages() { // Messaggi di errore personalizzati (opzionale)
        return [
            'appointment_time.after_or_equal' => 'L\'appuntamento deve essere in una data futura o oggi.',
            
        ];
    }
}



    

    
