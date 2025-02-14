<?php

// Define the namespace for the model (App\Models) 
namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Importing the Eloquent Model class for ORM functionality
use App\Models\TaskList; // Import the TaskList model to define the relationship between Task and TaskList

// Define the 'Task' model class, which extends Laravel's base Eloquent model
class Task extends Model
{
    // The $fillable property defines which attributes can be mass-assigned.
    // This is a security measure to prevent mass-assignment vulnerabilities.
    protected $fillable = [
        'name',         // The task name
        'description',  // The task description
        'is_completed', // Boolean indicating whether the task is completed or not
        'priority',     // The priority of the task (low, medium, high)
        'list_id'       // Foreign key to the related TaskList
    ];

    // The $guarded property defines which attributes cannot be mass-assigned.
    // In this case, 'id', 'created_at', and 'updated_at' cannot be mass-assigned.
    // This is the opposite of $fillable and provides another way to protect attributes.
    protected $guarded = [
        'id',           // Primary key for the Task table, cannot be mass-assigned
        'created_at',   // Timestamps automatically managed by Eloquent, not mass-assignable
        'updated_at'    // Timestamps automatically managed by Eloquent, not mass-assignable
    ];

    // Define a constant array to hold possible task priorities (low, medium, high)
    const PRIORITIES = [
        'low',    // Low priority task
        'medium', // Medium priority task
        'high'    // High priority task
    ];

    // Accessor method to get the priority class based on the priority value
    // This is useful to style the task based on its priority (success, warning, danger)
    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) {  // Match the priority value to determine its corresponding class
            'low' => 'success',    // If priority is 'low', return 'success' (green class)
            'medium' => 'warning', // If priority is 'medium', return 'warning' (yellow class)
            'high' => 'danger',    // If priority is 'high', return 'danger' (red class)
            default => 'secondary' // Default to 'secondary' class for undefined priorities
        };
    }

    // Define the relationship between the 'Task' model and the 'TaskList' model.
    // A task belongs to a task list (foreign key: 'list_id').
    // This method allows you to retrieve the related TaskList for a specific Task.
    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id'); // Defines a "belongs to" relationship with TaskList
    }
}