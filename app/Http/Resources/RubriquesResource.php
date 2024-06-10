<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RubriquesResource extends JsonResource
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
            'nivell' => $this->nivell,
            'descripcio' => $this->descripcio,
            'actiu' => $this->actiu,
            'criteris_avaluacio_id' => $this->criteris_avaluacio_id,
        ];
    }
}
