<!DOCTYPE html>
<html>
<head>
    <title>Welcome From Renty.com</title>
</head>

<body align="center">
<h2>Hello. Your landlord wants you to join to Renty. Your property id is. {{$property['id']}}</h2>
<p>Firstly, you need to Register at <a href="{{url('/register')}}">Register User</a></p>
<br/>
Your key for property is <h4><b>{{$property['property_key']}}</b></h4> Use this code , Please click on the below link to connect.
<br/>
<a href="{{url('property/connect')}}"><h3>Join your property Page.</h3></a>
</body>

</html>