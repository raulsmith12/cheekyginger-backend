<!DOCTYPE html>
<html lang="en">
<head>
    <title>You Have Mail from Cheeky Ginger Studio!</title>
</head>
<body>
    <h2>You have received a correspondence from the Cheeky Ginger Studio website that requires your attention.</h2>

    <p>Name: {{ $data['name'] }}</p>
    <p>Phone: {{ $data['phone_no'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Message: {{ $data['message'] }}</p>

    <img src="https://galacticblue.net/cheekyginger/img/Kiss-1-Cheeky-Ginger-Studio.png" width="75%" alt="Cheeky Ginger Studio" />
</body>
</html>