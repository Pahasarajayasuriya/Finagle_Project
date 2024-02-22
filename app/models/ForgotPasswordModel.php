<?php

class ForgotPasswordModel extends Model
{
    public function generateResetToken($email) {
        $db = new Database();
        
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

        $query = "UPDATE users
                  SET reset_token_hash = :token_hash,
                      reset_token_expires_at = :expiry
                  WHERE email = :email";

        $data = [
            'token_hash' => $token_hash,
            'expiry' => $expiry,
            'email' => $email
        ];

        return $db->query($query, $data);
    }
}
?>
