<?php

class ComplaintModel extends Model
{
    protected $table = 'complaints';
    public $errors = [];
    protected $allowedColumns = [
        'name',
        'teleno',
        'email',
        'complaint',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }

        if (empty($data['teleno'])) {
            $this->errors['teleno'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = "Invalid phone number";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        }

        if (empty($data['complaint'])) {
            $this->errors['complaint'] = "Complaint is required";
        }

        if (empty($this->errors)) {
            return $data;
        }
        // var_dump($this->errors);

        return false;
    }

    public function insertComplaint($data)
    {
        $validatedData = $this->validate($data);

        if (!$validatedData) {
            return false; // Return false if validation fails
        }

        return $this->insert($validatedData);
    }

    public function countComplaints()
    {
        $query = "SELECT COUNT(*) AS count FROM " . $this->table;
        $result = $this->query($query);
        return $result[0]->count;
    }
}
