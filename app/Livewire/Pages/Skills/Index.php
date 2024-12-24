<?php
namespace App\Livewire\Pages\Skills;

use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $skillId;
    public $skills;

    protected $rules = [
        'name' => 'required|min:2',
    ];

    public function mount()
    {
        $this->fetchSkills();
    }

    public function fetchSkills()
    {
        $this->skills = Skill::all();
    }

    public function save()
    {
        $this->validate();

        if ($this->skillId) {
            Skill::find($this->skillId)->update(['name' => $this->name]);
        } else {
            Skill::create(['name' => $this->name]);
        }

        $this->resetForm();
        $this->fetchSkills();
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        $this->skillId = $skill->id;
        $this->name = $skill->name;
    }

    public function delete($id)
    {
        Skill::find($id)->delete();
        $this->fetchSkills();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->skillId = null;
    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
