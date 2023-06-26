<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CanchaResource extends JsonResource
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
 			'locale_id' => $this->locale_id, 
 			'socio_id' => $this->socio_id, 
 			'canchas_tipo_id' => $this->canchas_tipo_id, 
 			'jugadore_id' => $this->jugadore_id, 
 			'codigo' => $this->codigo, 
 			'prefijo' => $this->prefijo, 
 			'direccion' => $this->direccion, 
 			'aforo' => $this->aforo, 
 			'google_map' => $this->google_map, 
 			'lat' => $this->lat, 
 			'lang' => $this->lang, 
 			'min_horas' => $this->min_horas, 
 			'max_horas' => $this->max_horas, 
 			'precio' => $this->precio, 
 			'estado' => $this->estado, 
 			'deleted_at' => $this->deleted_at, 
 			'created_at' => $this->created_at, 
 			'updated_at' => $this->updated_at, 
 			'distrito_id' => $this->distrito_id, 
 			
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
