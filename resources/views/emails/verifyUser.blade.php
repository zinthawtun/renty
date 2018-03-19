<!DOCTYPE html>
<html>
<head>
    <title>Welcome From Renty.com</title>
</head>

<body align="center">
<h2>Welcome to Renty.com {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}"><h3>Verify Email</h3></a>
</body>

</html>