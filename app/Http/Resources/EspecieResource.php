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
            'masaMolar' => round($this->masa_molar, 3),
            'densidad' => round($this->densidad, 3),
            'fusion' => round($this->fusion, 2),
            'ebullicion' => $this->ebullicion,
            'claseAcido' => $this->claseAcido->clase,
            'claseCarga' => $this->claseCarga->clase,
            'constantes' => ConstanteAcidaResource::collection($this->whenLoaded('constantes'))
        ];
    }
}
