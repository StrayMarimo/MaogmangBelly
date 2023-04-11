<!DOCTYPE html>
<html>

<head>
Contact
</head>

<body>
    <h5>Name: {{ $mailData['name'] }}</h5>
    <h5>Email: {{ $mailData['email'] }}</h5>
    <h5>Number: {{ $mailData['number'] }}</h5>

    <p>{{ $mailData['message'] }}</p>
</body>

</html>