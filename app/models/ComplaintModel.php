<?php

class ComplaintModel extends Model
{
    protected $table = 'complaints';
    protected $allowedColumns = [
        'name',
        'teleno',
        'email',
        'complaint',
    ];

    public function validate($data)
    {
        // Implement your validation logic here
        // Return validated data or false if validation fails
        // Example: return $validatedData;

        // For now, returning the input data as is (no validation)
        return $data;
    }

    public function insertComplaint($data)
    {
        // Validate data
        $validatedData = $this->validate($data);

        if ($validatedData) {
            // Insert data into the 'complaints' table
            return $this->insert($validatedData);
        }

        return false;
    }

    // Add other methods specific to the 'complaints' table if needed
}
