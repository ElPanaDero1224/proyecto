<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HotelCard extends Component
{
    public $hotel;
    public $checkin;
    public $checkout;
    public $precio;

    public function __construct($hotel, $checkin, $checkout, $precio)
    {
        $this->hotel = $hotel;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->precio = $precio;
    }

    public function render()
    {
        return view('components.hotel-card');
    }
}

