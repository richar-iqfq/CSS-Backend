<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConstanteAcidaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'valor_reportado' => $this->valor_reportado,
            'ka_values' => $this->ka_values(),
            'pka_values' => $this->pka_values(),
            'referencia' => [
                'Autor' => $this->referencia->autor,
                'Cita' => $this->referencia->cita
            ],
        ];
    }
}
