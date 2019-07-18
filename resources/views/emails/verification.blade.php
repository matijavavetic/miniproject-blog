<!DOCTYPE html>
<html>
<head>
    <title>Welcome!</title>
</head>

<body>
    <h1>Hi there {{ $data['name'] }}</h1>

    <p>Verify your email and account by clicking on the button below.</p>

    <a href="{{url('confirmation', $data['verification_token'])}}">VERIFY</a>
</body>

</html>