<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodCraft</title>
</head>
<body>
    <!-- form to add user with email password repeat password and role (dropdown with 'osr','gm','sk','admin','pm') and submit button -->
    <!-- 'username',
        'email',
        'password',
        'teleno',
        'role',
        'address', -->
    <form  method="post">
    <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter username">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password">
        <label for="teleno">Password</label>
        <input type="text" name="teleno" id="teleno" placeholder="Enter tel">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Enter address">
        
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="employee">Employee</option>
            <option value="manager">Manager</option>
            <option value="deliverer">Deliverer</option>
            <option value="admin">Admin</option>
            <!-- <option value="pm">PM</option> -->
        </select>
        <input type="submit">
    
</body>
</html>