<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lead;
use Livewire\Component;

class Admission extends Component
{
    public $search;
    public $leads = [];
    public $lead_id;
    public $course_id;
    public $selectedCourse;

    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission', [
            'courses' => $courses
        ]);
    }
    public function search()
    {
        $this->leads = Lead::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%')
            ->get();
    }
    public function courseSelected()
    {
        $this->selectedCourse = Course::find($this->course_id);
    }
}
