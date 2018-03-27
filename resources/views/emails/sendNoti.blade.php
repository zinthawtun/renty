<!DOCTYPE html>
<html>
<head>
    <title>Welcome From Renty.com</title>
</head>

<body align="center">
<h2>Hello {{$user->name}}</h2>
<br/>
You have new message sent by <h4><b>{{$l_user['email']}}</b></h4> , Look it it
<br/>
<a href="{{url('home')}}"><h3>Join your property Page.</h3></a>
</body>

</html>