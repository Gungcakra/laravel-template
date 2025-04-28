<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\ServiceOperational;
use Livewire\Attributes\Layout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public $startDate, $endDate, $thisMonthIncome, $thisMonthServices, $incomePerformance, $incomeChart;

    protected $listeners = ['loadData'];

    public function mount()
    {

        $userPermissions = Auth::user()->roles->flatMap(function ($role) {
            return $role->permissions->pluck('name');
        });

        if (!$userPermissions->contains('dashboard')) {
            abort(403, 'Unauthorized action.');
        }

    
        $currentMonth = Carbon::now()->month;

        $this->thisMonthIncome = ServiceOperational::with(['services', 'spareparts'])
            ->where('status', 1)
            ->whereMonth('created_at', $currentMonth)
            ->get()
            ->reduce(function ($carry, $item) {
                $serviceIncome = $item->services->sum('pivot.price');
                $sparepartIncome = $item->spareparts->sum('pivot.price');
                return $carry + $serviceIncome + $sparepartIncome;
            }, 0);

        $this->thisMonthServices = ServiceOperational::with(['services', 'spareparts'])
            ->where('status', 1)
            ->whereMonth('created_at', $currentMonth)
            ->count();


        $this->startDate = Carbon::now()->startOfMonth();
        $this->endDate = Carbon::now();

        $data = ServiceOperational::with(['services', 'spareparts'])
            ->where('status', 1)
            ->get();

        $this->incomePerformance = $data->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d H:00');
        })->map(function ($group) {
            return $group->reduce(function ($carry, $item) {
                $serviceIncome = $item->services->sum('pivot.price');
                $sparepartIncome = $item->spareparts->sum('pivot.price');
                return $carry + $serviceIncome + $sparepartIncome;
            }, 0);
        });
        $this->incomeChart = $this->incomePerformance->map(function ($value, $key) {
            return [
                'hour' => $key,
                'income' => $value,
            ];
        })->values();
        //  $this->loadIncomePerformance($this->startDate, $this->endDate);

    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard')->with([
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'menus' => Menu::with('submenus')->get(),
            'thisMonthIncome' => $this->thisMonthIncome,
            'thisMonthService' => $this->thisMonthServices,
            'incomeChart' => $this->incomeChart,
        ]);
    }

    public function loadData($startDate, $endDate)
    {
        $this->startDate = Carbon::parse($startDate);
        $this->endDate = Carbon::parse($endDate);
        $this->loadIncomePerformance($this->startDate, $this->endDate);
    }
    // private function loadIncomePerformance($startDate, $endDate)
    // {
        

    //     // $this->dispatch('incomeChartUpdated');

    // }
}
