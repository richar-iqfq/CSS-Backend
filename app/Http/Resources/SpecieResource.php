<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecieResource extends JsonResource
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
            'name' => $this->name,
            'formula' => $this->formula,
            'calculatedMolarWeight' => $this->calculatedMolarWeight,
            'molarWeight' => $this->molarWeight,
            'density' => $this->density,
            'meltingPoint' => $this->meltingPoint,
            'boilingPoint' => $this->boilingPoint,
            'acidType' => $this->acidType->type,
            'chargeType' => $this->chargeType->type,
            'constants' => AcidConstantResource::collection($this->whenLoaded('constants'))
        ];
    }
}
