<?php

class User extends Model
{
    public $table = "users";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'username',
        'image',
        'email',
        'password',
        'teleno',
        ' user_role',
        'address',
        'branch',
        'joined_date',
        'reset_token_hash',
        'reset_token_expires_at'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['username'])) {
            $this->errors['username'] = "Username is required";
        }


        //check email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        } else 
        if ($this->where(['email' => $data['email']])) {
            $this->errors['email'] = "This email already exists";
        }


        if (empty($data['password'])) {
            $this->errors['password'] = "A password is required";
        }
        if ($data['repassword'] !== $data['password']) {
            $this->errors['password'] = "Password do not match";
        }
        if (empty($data['teleno'])) {
            $this->errors['teleno'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = "Invalid phone number";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function edit_validate($data,$id)
    {
        $this->errors = [];

        if (empty($data['username'])) {
            $this->errors['username'] = "Username is required";
        }


        //check email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        }
         else 
        if ($results = $this->where(['email' => $data['email']])) {
            foreach ($results as $result) {
                if($id != $result->id){
                    $this->errors['email'] = "This email already exists";
                }
            }
        }

        if (empty($data['teleno'])) {
            $this->errors['teleno'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = "Invalid phone number";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}