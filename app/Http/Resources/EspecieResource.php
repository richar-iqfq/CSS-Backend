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
            'masaMolarCalculada' => $this->masa_molar_calculada,
            'masaMolar' => $this->masa_molar,
            'densidad' => $this->densidad,
            'fusion' => $this->fusion,
            'ebullicion' => $this->ebullicion,
            'claseAcido' => $this->claseAcido->clase,
            'claseCarga' => $this->claseCarga->clase,
            'constantes' => ConstanteAcidaResource::collection($this->whenLoaded('constantes'))
        ];
    }
}
