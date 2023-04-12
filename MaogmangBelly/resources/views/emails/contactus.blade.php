<!DOCTYPE html>
<html>

<head>
Contact
</head>

<body>
    <p class="fs-4 fw-semibold">
        Name: {{ $mailData['name'] }} <br>
        Email: {{ $mailData['email'] }} <br>
        Number: {{ $mailData['number'] }}
    </p>

    <p class="fs-4">Message:<br> {{ $mailData['message'] }}</p>
</body>

</html>