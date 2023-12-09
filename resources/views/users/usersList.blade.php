<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        input[type="text"] {
            padding: 5px;
        }

        .add-user-button, button.search {
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        button.search {
            margin-right: 10px;
        }

        .add-user-button {
            float: right;
        }

        form {
            display: inline-block;
        }

        button.edit, button.delete {
            padding: 5px 8px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h2>User List</h2>
<a href="{{ route('users.create') }}" class="add-user-button">Add</a>

<form action="{{ route('users.index') }}" method="GET">
    <input type="text" name="q" value="{{ request('q') }}">
    <button type="submit" class="search">Search</button>
</form>

<table>
    <thead>
    <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $index => $user)
        <tr>
            <td>{{ $users->firstItem() + $index }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile }}</td>
            <td> @if($user->status == 1)
                    Active
                @else
                    Inactive
                @endif</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" title="Edit User">
                    <button class="edit">✏️</button>
                </a>

                <!-- Delete user button with jQuery confirmation popup -->
                <form id="deleteForm-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST"
                      style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" title="Delete User" class="delete" onclick="confirmDelete({{ $user->id }})">
                        ❌
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No users found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
{{$users->links('custom')}}

<script>
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            $('#deleteForm-' + userId).submit();
        }
    }

</script>

</body>
</html>
