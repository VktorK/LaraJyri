<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "date_of_order" => $this->date_of_order,
            "total_sum" => $this->total_sum,
            "service_name" => $this->service_name,
            "user" => $this->user,
        ];
    }
}
