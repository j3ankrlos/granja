<?php

namespace App\Livewire;

use Livewire\Component;

use App\Services\DashboardService;

class Dashboard extends Component
{
    public array $stats = [];

    public function mount(DashboardService $service)
    {
        $this->stats = $service->getStats();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'data' => $this->stats
        ])->title('Dashboard');
    }
}
