<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FlightCard extends Component
{
    public $ruta;
    public $origen;
    public $destino;
    public $fechaIda;
    public $fechaVuelta;
    public $precio;
    public $duracion;

    public function __construct($ruta, $origen, $destino, $fechaIda, $fechaVuelta, $precio, $duracion)
    {
        $this->ruta = $ruta;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->fechaIda = $fechaIda;
        $this->fechaVuelta = $fechaVuelta;
        $this->precio = $precio;
        $this->duracion = $duracion;
    }

    public function render()
    {
        return view('components.flight-card');
    }
}

