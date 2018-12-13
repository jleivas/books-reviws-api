<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
        'user' => $this->user,
        'ratings' => $this->ratings,
        'average_rating' => $this->ratings->avg('rating')
      ];
    }

    /**
     * Recurso creado con php artisan make:resource BookResource
     * 
     * Como sugiere su nombre, esto transformará el recurso en una matriz. 
     * La matriz está formada por los atributos que queremos convertir a JSON 
     * al enviar la respuesta. Así que la respuesta, además de contener los detalles 
     * sobre un libro, también contendrá al usuario que agregó el libro y todas las 
     * calificaciones del libro. Cualquier detalle que no queremos que se incluya en 
     * la respuesta JSON, simplemente lo eliminamos del toArray()método. Notará que 
     * estamos convirtiendo las fechas ( created_aty update_at) en cadenas porque de 
     * lo contrario, las fechas se devolverán como objetos en la respuesta.
     *
     * Como puede ver, podemos acceder a las propiedades del modelo directamente desde 
     * la $thisvariable porque una clase de recurso representará automáticamente el acceso 
     * de la propiedad y el método al modelo subyacente para un acceso conveniente. 
     * Ahora podemos hacer uso de la BookResourceclase en nuestro controlador.
     */
}
