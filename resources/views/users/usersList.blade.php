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
    </style>
</head>
<body>

<h2>User List</h2>

<form action="{{ route('users.index') }}" method="GET">
    <input type="text"  name="q" value="{{ request('q') }}">
    <button type="submit">Search</button>
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
            <td>{{ $users->firstItem() + $index }}
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->status }}</td>
            <td></td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No users found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
{{$users->links()}}

</body>
</html>
