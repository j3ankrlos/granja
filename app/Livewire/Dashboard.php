<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public int $inventarioA002Count = 0;
    public int $inventarioA006Count = 0;
    public int $solicitudesPendientesCount = 0;
    public int $alertasStockA006Count = 0;
    public int $personalActivoCount = 130;
    public int $enReposoCount = 0;
    public int $vacacionesCount = 0;
    public int $regresosPendientesCount = 0;

    public function render()
    {
        return view('livewire.dashboard')->title('Dashboard');
    }
}
