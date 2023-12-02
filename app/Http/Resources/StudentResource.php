<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'control_number' => $this->control_number,
            'student_name' =>$this-> student_name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'telephone' => $this->telephone,
            'street' => $this->street,
            'suburb' => $this->suburb,
            'status' => $this->status,
            'street' => $this->street,
            'semester' => $this->semester,
            'role_id' => $this->role,
            'town_id' => $this->town,
            'career_id' => $this->career

        ];
    }
}
