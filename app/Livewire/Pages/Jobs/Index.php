<?php
namespace App\Livewire\Pages\Jobs;

use App\Models\JobPosting;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        // Fetch all job posts from the database
        $this->jobs = JobPosting::all()->map(function($job) {
            return [
                "id" => $job->id,
                "title" => $job->title,
                "description" => $job->description,
                "company_name" => $job->company_name,
                // Make sure to correctly handle the logo URL
                "company_logo" => $job->logo ? asset('storage/'.$job->logo) : null,
                "experience" => $job->experience,
                "salary" => $job->salary,
                "location" => $job->location,
                // Check if skills is a string before decoding it as JSON
                "skills" => is_array($job->skills) ? $job->skills : json_decode($job->skills, true),
                "extra" => is_array($job->extra_info) ? $job->extra_info : json_decode($job->extra_info, true),
            ];
        })->toArray(); // Convert the collection to an array
    }

    // Method to delete a job
    public function deleteJob($jobId)
    {
        // Find the job post by ID
        $job = JobPosting::find($jobId);

        if ($job) {
            // Delete the job from the database
            $job->delete();

            // Optionally, remove it from the jobs array to update the view
            $this->jobs = JobPosting::all()->map(function($job) {
                return [
                    "id" => $job->id,
                    "title" => $job->title,
                    "description" => $job->description,
                    "company_name" => $job->company_name,
                    "company_logo" => asset($job->company_logo),
                    "experience" => $job->experience,
                    "salary" => $job->salary,
                    "location" => $job->location,
                    "skills" => json_decode($job->skills, true),
                    "extra" => json_decode($job->extra_info, true),
                ];
            })->toArray();

            // Optionally, you can flash a message for feedback
            session()->flash('message', 'Job deleted successfully!');
        }
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
