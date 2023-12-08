<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
</head>
<body>

<h2>Add New User</h2>

<form action="{{ route('users.store') }}" method="post">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" required>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>

    <button type="submit">Add User</button>
</form>

</body>
</html>
