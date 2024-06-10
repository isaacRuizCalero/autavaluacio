<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResultatAprenentatgeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ordre' => $this->ordre,
            'descripcio' => $this->descripcio,
            'actiu' => $this->actiu,
            'moduls_id' => $this->moduls_id,
            'criteris_avaluacio' => CriteriAvaluacioResource::collection($this->whenLoaded('criterisAvaluacio')),
        ];
    }
}
