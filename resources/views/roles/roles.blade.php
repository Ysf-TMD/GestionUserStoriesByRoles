@extends("layouts.master")
@section("content")
    <div class="container-fluid ">
        <div class="row">
            <div class="container flex bg-dark p-3 h4 text-white" >
                <div class="col-md-4 ">
                    Liste Of All Roles
                </div>
                <div class="col-md text-end">
                    <a href="{{route("home")}}"><button class="btn-sm btn-primary">Retour</button></a>
                </div>
            </div>


        </div>
    </div>

@endsection
