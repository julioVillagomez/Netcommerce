<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'description' => $this->description,
            'user' => optional($this->user)->name,
            'is_completed' => $this->is_completed,
            'start_at' => $this->start_at->format('Y-m-d H:m:s'),
            'expired_at' => $this->expired_at->format('Y-m-d H:m:s')
        ];
    }
}
