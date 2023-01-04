<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component
{
    public function render()
    {
        $leads = Lead::paginate(10);
        return view('livewire.lead-index', [
            'leads' => $leads
        ]);
    }
    public function leadDelete($id, FlasherInterface $flasher)
    {
//        permission_check('lead-management');
        $lead = Lead::findOrFail($id);
        $lead->delete();
        $flasher->addInfo('Lead deleted successfully');
    }
}
