<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExecutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           "id"=>$this->id,
           "Last_name"=>$this->Last_name,
           "First_name"=>$this->First_name,
           "Middle_name"=>$this->Middle_name,
           "Phone"=>$this->Phone,
           "Specialization"=>$this->Specialization,
           "experience"=>$this->experience,
           "address"=>$this->address


        ];

    }
}
