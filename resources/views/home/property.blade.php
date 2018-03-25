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
                    @if($property->property_key == null)
                    <a class="btn btn-sm btn-dark" href="{{route('invite', $property->id)}}" role="button">Invite</a>
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