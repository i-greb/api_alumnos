<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentColletion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    /*el método se encarga de convertir la coleccion de recursos a un arreglo*/
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
