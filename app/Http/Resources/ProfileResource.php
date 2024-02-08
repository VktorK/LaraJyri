<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "Last_name" => $this->Last_name,
            "First_name" => $this->First_name,
            "Middle_name" => $this->Middle_name,
            "gender" => $this->gender,
            "date_of_but" => $this->date_of_but,
            "address_of_" => $this->address_of_,
            "residential_address" => $this->residential_address,
            "login" => $this->login,
            "balance" => $this->balance,
        ];
    }
}
