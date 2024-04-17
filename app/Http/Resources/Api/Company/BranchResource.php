<?php

namespace App\Http\Resources\Api\Company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'branches',
            'id' => (string) $this->resource->id,
            'attributes' => [
                'name' => $this->when(!is_null($this->name), $this->name),
                'address' => $this->when(!is_null($this->address), $this->address),
                'city' => $this->when(!is_null($this->city), $this->city),
                'state' => $this->when(!is_null($this->state), $this->state),
                'postal_code' => $this->when(!is_null($this->postal_code), $this->postal_code),
                'created_by' => $this->when(!is_null($this->created_by), $this->created_by),
                'updated_by' => $this->when(!is_null($this->updated_by), $this->updated_by),
                'created_at' => $this->when(!is_null($this->created_at), $this->created_at),
                'updated_at' => $this->when(!is_null($this->updated_at), $this->updated_at)
            ],
            'relationships' => [
                'company' => [
                    'data' => [
                        'type' => 'companies',
                        'id' => $this->company_id
                    ]
                ]
            ],
            'links' => [
                'self' => url('api/v1/branches/' . $this->resource->id)
            ]
        ];
    }
}
