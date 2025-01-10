<?php

namespace App\Livewire\Taches;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

class CreateTaches extends Component
{
    public $ref;
    public $label;
    public $project_id;
    public $parent_task_id;
    public $start_date;
    public $end_date;
    public $planned_workload;
    public $progress = 0;
    public $priority = 2; // Moyenne par défaut
    public $visibility = 1; // Tous les contacts par défaut
    public $budget;
    public $assigned_to;
    public $description;

    protected $rules = [
        'label' => 'required|min:3',
        'project_id' => 'nullable|exists:projects,id',
        'parent_task_id' => 'nullable|exists:tasks,id',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'planned_workload' => 'nullable|numeric|min:0',
        'progress' => 'required|integer|min:0|max:100',
        'priority' => 'required|integer|min:0|max:4',
        'visibility' => 'required|integer|min:0|max:1',
        'budget' => 'nullable|numeric|min:0',
        'assigned_to' => 'nullable|exists:users,id',
        'description' => 'nullable|string'
    ];

    public function createDraft()
    {
        $this->validate();
        // Logique de création en brouillon
    }

    public function createAndValidate()
    {
        $this->validate();
        // Logique de création et validation
    }

    public function render()
    {
        return view('livewire.taches.create-taches', [
            // 'projects' => Project::orderBy('ref')->get(),
            // 'parentTasks' => Task::whereNull('parent_id')->orderBy('ref')->get(),
            // 'users' => User::orderBy('name')->get(),
        ]);
    }
}
