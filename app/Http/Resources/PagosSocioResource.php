<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagosSocioResource extends JsonResource
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
 			'socio_id' => $this->socio_id, 
 			'pagos_tipo_id' => $this->pagos_tipo_id, 
 			'numero_celular' => $this->numero_celular, 
 			'numero_cc' => $this->numero_cc, 
 			'nuemro_cci' => $this->nuemro_cci, 
 			'qr_imagen' => $this->qr_imagen, 
 			'estado' => $this->estado, 
 			'deleted_at' => $this->deleted_at, 
 			'created_at' => $this->created_at, 
 			'updated_at' => $this->updated_at, 
 			'banco_id' => $this->banco_id, 
 			
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
