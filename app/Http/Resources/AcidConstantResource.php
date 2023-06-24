<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AcidConstantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'reportedValue' => $this->reportedValue,
            'kaValues' => $this->ka_values(),
            'pkaValues' => $this->pka_values(),
            'references' => [
                'author' => $this->reference->author,
                'citation' => $this->reference->citation
            ],
        ];
    }
}
