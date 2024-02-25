<?php

class Send_passwordModel extends Model
{
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
}


