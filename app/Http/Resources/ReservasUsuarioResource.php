<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservasUsuarioResource extends JsonResource
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
            'id' => $this->id, 
 			'horario_id' => $this->horario_id, 
 			'pagos_socio_id' => $this->pagos_socio_id, 
 			'user_id' => $this->user_id, 
 			'estado_reserva' => $this->estado_reserva, 
 			'comprobante' => $this->comprobante, 
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
