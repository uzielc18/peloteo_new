<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocioResource extends JsonResource
{
    /**
     * @var null
     */
    protected $message = null;

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'user_id' => $this->user_id,
            'user_name' => $this->name,
            'razon_social' => $this->razon_social,
 			'ruc' => $this->ruc, 
 			'dni' => $this->dni, 
 			'direccion' => $this->direccion, 
 			'telefono' => $this->telefono, 
 			'celular' => $this->celular, 
 			'correo_personal' => $this->correo_personal, 
 			'correo_empresarial' => $this->correo_empresarial, 
 			'estado' => $this->estado, 
 			'deleted_at' => $this->deleted_at, 
 			'created_at' => $this->created_at, 
 			'updated_at' => $this->updated_at, 
 			
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success' => true,
            'message' => $this->message,
            'meta' => null,
            'errors' => null
        ];
    }
}
