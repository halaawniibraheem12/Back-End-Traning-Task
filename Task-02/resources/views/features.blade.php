
<!DOCTYPE html>
<html>
<head>
    <title>Features</title>
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
    </style>
</head>
<body>

    <h1>Features</h1>

    <ul>
        @foreach($features as $feature)
            <li>{{ $feature }}</li>
        @endforeach
    </ul>

</body>
</html>
