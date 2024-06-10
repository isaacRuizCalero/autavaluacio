<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CriteriAvaluacioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ordre' => $this->ordre,
            'descripcio' => $this->descripcio,
            'actiu' => $this->actiu,
            'resultats_aprenentatge_id' => $this->resultats_aprenentatge_id,
        ];
    }
}
