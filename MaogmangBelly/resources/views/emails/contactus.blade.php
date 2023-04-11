<!DOCTYPE html>
<html>

<head>
    <title>Maogmang Belly</title>
</head>

<body>
    <h5>Name: {{ $mailData['name'] }}</h5>
    <h5>Email: {{ $mailData['email'] }}</h5>
    <h5>Number: {{ $mailData['number'] }}</h5>

    <p>{{ $mailData['message'] }}</p>
</body>

</html>