<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EspecieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'formula' => $this->formula,
            'masa_molar' => $this->masa_molar,
            'densidad' => $this->densidad,
            'fusion' => $this->fusion,
            'ebullicion' => $this->ebullicion,
            'clase_acido' => $this->claseAcido->clase,
            'clase_carga' => $this->claseCarga->clase,
            'constantes' => ConstanteAcidaResource::collection($this->whenLoaded('constantes'))
        ];
    }
}
