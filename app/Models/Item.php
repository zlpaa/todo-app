<?php

// Define the namespace for the model (typically App\Models in Laravel)
namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Importing the Eloquent Model class, which provides all the functionality for interacting with the database.

// Define the 'Item' class, which extends the base Model class provided by Laravel
class Item extends Model
{
    // The $fillable property is an array that specifies which attributes of the model are mass assignable.
    // In this case, the 'name' attribute can be mass-assigned.
    protected $fillable = ['name'];  // This protects the 'name' attribute from mass-assignment vulnerabilities.
}
