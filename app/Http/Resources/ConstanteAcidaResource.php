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
            'valorReportado' => $this->valor_reportado,
            'kaValues' => $this->ka_values(),
            'pkaValues' => $this->pka_values(),
            'referencia' => [
                'autor' => $this->referencia->autor,
                'cita' => $this->referencia->cita
            ],
        ];
    }
}
