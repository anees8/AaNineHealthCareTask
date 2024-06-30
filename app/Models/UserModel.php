<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Name of the database table
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = ['username', 'email', 'password', 'created_at', 'updated_at']; // Allowed fields to be saved/updated
    protected $useTimestamps = true; // Enable auto timestamps
    protected $useSoftDeletes = true; // Enable soft deletes
    protected $deletedField = 'deleted_at'; // Soft delete field

    // Optional: Define validation rules for your model's data
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
        'password_confirmation' => 'required|matches[password]',
    ];

    // Optional: Define validation messages for your validation rules
    protected $validationMessages = [
        'username' => [
            'required' => 'The username field is required.',
            'min_length' => 'The username must be at least {param} characters.',
            'max_length' => 'The username cannot exceed {param} characters.',
        ],
        'email' => [
            'required' => 'The email field is required.',
            'valid_email' => 'Please provide a valid email address.',
            'is_unique' => 'The email address is already taken.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min_length' => 'The password must be at least {param} characters.',
        ],
        'password_confirmation' => [
            'required' => 'The password confirmation field is required.',
            'matches' => 'The password confirmation does not match the password field.',
        ],
    ];

    // Optional: Define custom validation rules
    protected function validatePasswordStrong($value, string $error = null): bool
    {
        // Example custom validation rule: Password must contain at least one uppercase letter
        if (!preg_match('/[A-Z]/', $value)) {
            return false;
        }
        return true;
    }
}
