<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeiturasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Leitura' => $this->leitura_id,
            'Contador' => $this->contador_id,
            'Nome do cliente' => $this->contador->cliente->nome,
            'Leitura anterior' => $this->leitura_anterior,
            'Data da última leitura' => date_format($this->data_criacao,"d-m-Y"),
            'Zona' => $this->contador->cliente->zona->designacao
        ];
    }
}
