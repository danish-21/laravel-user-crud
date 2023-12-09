{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
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
</head>
<body>

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <h4>Add User</h4>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" required>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <button type="submit">Add User</button>
    <a href="{{ route('users.index') }}" class="back"><button type="button">Back</button></a>
</form>

</body>
</html>
--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
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

        #success-message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<form id="addUserForm" action="{{ route('users.store') }}" method="post">
    @csrf
    <h4>Add User</h4>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mobile">Mobile:</label>
    <input type="text" id="mobile" name="mobile" required>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <button type="button" id="submitBtn">Add User</button>
    <a href="{{ route('users.index') }}" class="back"><button type="button">Back</button></a>

    <div id="success-message"></div>
</form>

<script>
    $(document).ready(function () {
        // Handle form submission using jQuery
        $("#submitBtn").click(function () {
            $.ajax({
                url: $("#addUserForm").attr("action"),
                method: "POST",
                data: $("#addUserForm").serialize(),
                success: function (response) {
                    // Display success message
                    $("#success-message").text("User added successfully!");

                    // Reset the form
                    $("#addUserForm")[0].reset();

                    // You may redirect to another page if needed
                    // window.location.href = "{{ route('users.index') }}";
                },
                error: function (error) {
                    // Handle errors if any
                    console.log(error);
                }
            });
        });
    });
</script>


</body>
</html>
