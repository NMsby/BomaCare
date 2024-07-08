<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
</head>
<body class="bg-gray-100">
 <form action="{{ route('callback') }}">
    Sorry Payment Failed 
    <input type="submit" value="OK" class=" bg-blue-600">
 </form>
</body>
</html>