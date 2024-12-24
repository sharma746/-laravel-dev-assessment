<?php
namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobPosting;
use App\Models\Skill;

class Create extends Component
{
    use WithFileUploads;
    public $skills = [];
    public $title, $description, $experience, $salary, $location, $extra_info, $company_name, $logo;

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'company_name' => 'required|string',
            'skills' => 'required|array',
            'logo' => 'nullable|image|max:1024', // 1MB max
        ]);

        $logoPath = $this->logo ? $this->logo->store('logos', 'public') : null;
        $skillsString = is_array($this->skills) ? implode(',', $this->skills) : '';

        JobPosting::create([
            'title' => $this->title,
            'description' => $this->description,
            'experience' => $this->experience,
            'salary' => $this->salary,
            'location' => $this->location,
            'extra_info' => $this->extra_info,
            'company_name' => $this->company_name,
            'logo' => $logoPath,
            'skills' => implode(',', $this->skills),
        ]);

        session()->flash('message', 'Job posting created successfully!');
        $this->reset();
    }

    public function render()
    {
        $skills = Skill::all();
        return view('livewire.pages.jobs.create',compact('skills'));
    }
}
