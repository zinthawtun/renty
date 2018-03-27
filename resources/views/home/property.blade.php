@if($user->role->name == 'Landlord')
    <h5  class=""> Properties</h5>
    <div class="jumbotron">

        @foreach($properties as $property)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$property->post_code}}</h5>
                    <p class="card-text">{{$property->address}}</p>

                    <form action="{{ route('properties.destroy',$property->id) }}" method="POST">
                        <a class="btn btn-sm btn-dark" href="{{route('properties.edit', $property->id)}}" role="button">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="myFunction()" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <br>

                    @if($no_t != $property->tenant_no)
                        <a class="btn btn-sm btn-dark" href="{{route('invite', $property->id)}}" role="button">Invite</a>

                    @else()

                        <a class="btn btn-sm btn-light" role="button">Linked</a>
                        <a class="btn btn-sm btn-dark"  href="{{route('LinkedUsers', $property->id)}}" role="button">Send Message</a>
                    @endif
                    <script>
                        function myFunction() {
                            var r = confirm("Are you sure?");
                            if (r==true) {
                                window.location.href = "/home";
                            } else {
                                window.location.href = "/home";
                            }
                        }
                    </script>
                </div>
            </div>
            <br>
        @endforeach

    </div>
@endif
@if($user->role->name == 'Tenant')
    <h5  class=""> Properties</h5>
    <div class="jumbotron">
        @if($user->property_key != null)
        @foreach($l_properties as $property)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$property->post_code}}</h5>
                    <p class="card-text">{{$property->address}}</p>
                    <br>
                        <a class="btn btn-sm btn-light" role="button">Linked</a>
                        <a class="btn btn-sm btn-dark" href="{{route('createMessage', $property->id, $user->id)}}" role="button">Send Message</a>
                </div>
            </div>
            <br>
        @endforeach
@endif
    </div>
@endif