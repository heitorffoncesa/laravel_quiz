<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->uuid,
            'role' => $this->role->name,
            'name' => $this->name,
            'email' => $this->email,
            'status' => !is_null($this->deleted_at)
        ];
    }
}
