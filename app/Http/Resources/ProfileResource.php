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
            "date_of_but" => $this->date_of_but,
            "residential_address" => $this->residential_address,
            "login" => $this->login,
            "balance" => $this->balance,
            "user_id"=> $this->user_id
        ];
    }
}
