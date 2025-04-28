<?php

namespace App\Livewire;

use App\Models\ServiceOperational;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class ReportServiceOperational extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $serviceOperational, $startDate = '', $endDate = '', $status = '', $range, $tax = 12000;

    protected $listeners = ['loadData','loadStatus'];

    public function mount()
    {
        $userPermissions = Auth::user()->roles->flatMap(function ($role) {
            return $role->permissions->pluck('name');
        });
    
        if (!$userPermissions->contains('report-serviceoperational')) {
            abort(403, 'Unauthorized action.');
        }
    }
    
    public function render()
    {
        return view('livewire.pages.admin.report.service.index', [
            'data' => ServiceOperational::when($this->startDate || $this->endDate || $this->status, function ($query) {
            if ($this->startDate) {
                $query->where('created_at', '>=', $this->startDate);
            }
            if ($this->endDate) {
                $query->where('created_at', '<=', $this->endDate);
            }
            if ($this->status) {
                $query->where('status', $this->status);
            }
            }, function ($query) {
                
            $query->orderBy('created_at', 'asc');
            })->get()
        
        ]);
    }

    public function loadData($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    
    
       
    }
    public function loadStatus($statusChange)
    {
        $this->status = $statusChange;
    }
  
}
