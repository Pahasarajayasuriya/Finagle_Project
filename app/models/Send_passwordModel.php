<?php

class Send_passwordModel extends Model
{

    public $errors = [];

    public function getUserByResetToken($token)
    {
        $token_hash = hash("sha256", $token);
        $db = new Database();
        $sql = "SELECT * FROM users WHERE reset_token_hash = :token_hash";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':token_hash', $token_hash, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function isTokenExpired($token)
    {
        $user = $this->getUserByResetToken($token);

        if ($user === false) {
            return "Token not found";
        }

        if (strtotime($user["reset_token_expires_at"]) <= time()) {
            return "Token has expired";
        }

        return null;
    }

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['password'])) {
            $this->errors['password'] = "A password is required";
        }
        if ($data['repassword'] !== $data['password']) {
            $this->errors['password'] = "Password do not match";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public function updatePasswordAndToken($password_hash, $user_id)
    {
        $db = new Database();
        $sql = "UPDATE users
                SET password = :password_hash,
                    reset_token_hash = NULL,
                    reset_token_expires_at = NULL
                WHERE id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
