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
            "status_idx" => $this -> status_idx,
            "total_sum" => $this->total_sum,
            "created_at"=>$this->created_at,
            "user" => $this->user

        ];
    }
}
