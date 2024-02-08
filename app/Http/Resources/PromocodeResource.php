<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromocodeResource extends JsonResource
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
           "value"=>$this->value,
           "date_of_end"=>$this->date_of_end,
           "summ"=>$this->summ,
           "summ_from"=>$this->summ_from,
           "user"=>$this->user,
        ];
    }
}
