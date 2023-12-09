<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.back {
            background-color: #333;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<form id="updateUserForm" action="{{ route('users.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h4>Edit User</h4>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $users->name }}" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="{{ $users->email }}" required>

    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" value="{{ $users->mobile }}" required>

    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="1" {{ $users->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $users->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>

    <button id="updateBtn" type="button">Update User</button>
    <a href="{{ route('users.index') }}" class="back"><button type="button">Back</button></a>
</form>

<script>
    $(document).ready(function () {
        $("#updateBtn").click(function () {
            $.ajax({
                url: $("#updateUserForm").attr("action"),
                method: "POST",
                data: $("#updateUserForm").serialize(),
                success: function (response) {
                    $("#success-message").text("User updated successfully!");

                     window.location.href = "{{ route('users.index') }}";
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

</body>
</html>
