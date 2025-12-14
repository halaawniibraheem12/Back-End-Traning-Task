
<!DOCTYPE html>
<html>
<head>
    <title>Team</title>
    <style>
        body {
            background-color: lightblue;
            color: navy;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

         
        h1 {
            color: #0a1a50ff;
        } 

        table {
            width: 400px;
            border-collapse: collapse;
        }

        th {
            background-color: navy;
            color: white;
            padding: 10px;
            text-align: center;
        }

        td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Our Team</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
        </tr>

        @foreach($team as $member)
            <tr>
                <td>{{ $member['name'] }}</td>
                <td>{{ $member['role'] }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
