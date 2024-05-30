<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'category_id' => $this->category_id,
            'description' => $this->description,
            // 'category' => $this->category->name ?? '', // dak ?? ka pea ber vea ot mean oy vea jenh tte
            // 'create_at' => $this->created_at->format('jS-F-Y'),
        ];
    }
}
