<?php
require_once 'class/User.php';

$user = new User();

// CREATE
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->create($name, $email, $password);
}

// READ
$users = $user->readAll();

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user->update($id, $name, $email);
}

// DELETE
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $user->delete($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users CRUD</title>
</head>
<body>
    <h1>Users CRUD</h1>

    <!-- CREATE FORM -->
    <form method="POST" action="user.php">
        <h2>Create User</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="create">Create</button>
    </form>

    <hr>

    <!-- READ USERS -->
    <h2>Users List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if (count($users) > 0) { ?>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <?php /*
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="text" name="name" value="<?= $user['name'] ?>" required>
                            <input type="email" name="email" value="<?= $user['email'] ?>" required>
                            <button type="submit" name="update">Update</button>
                        </form>
                        */ ?>
                    </td>
                </tr>
            <?php } } else { ?>
            <tr>
                <td colspan="4">N/A</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
