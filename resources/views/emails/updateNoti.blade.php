<!DOCTYPE html>
<html>
<head>
    <title>Welcome From Renty.com</title>
</head>

<body align="center">
{{$user = auth()->user()}}
<h2>Hello  {{$e_user->name}}</h2>
<br/>
You have new message sent by {{$user->name}}<h4><b>{{$notification['message']}}</b></h4> , Look it it
<br/>
<a href="{{url('home')}}"><h3>Join your property Page.</h3></a>
</body>

</html>