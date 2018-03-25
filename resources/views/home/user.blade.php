<div class="jumbotron">
    <h5 class="display-5">Hello {{$user->name}}</h5>
    <div class="text-center m-sm-auto">
        <p>  <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="rounded" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"></p>
    </div>
    <div class="m-sm-auto">
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        @if($user->role->name == 'Landlord')
            <br>
            <div> <p><a class="btn btn-sm btn-dark" href="{{route('boards.create')}}" role="button">Post New Message</a></p> </div>
            <div> <p><a class="btn btn-sm btn-dark" href="{{route('boards.show', $user->id)}}" role="button">Show my posts</a></p> </div>
            <div> <p><a class="btn btn-sm btn-dark" href="{{route('properties.create')}}" role="button">Create Property</a></p> </div>
        @endif
        <div> <p><a class="btn btn-sm btn-primary" href="{{route('boards.index') }}" role="button">See Announcements</a></p> </div>
    </div>
</div>