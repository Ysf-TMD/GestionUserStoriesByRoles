@extends("layouts.master")
@section("content")
    <div class="container-fluid ">
        <div class="row">
            <div class="container flex bg-dark p-3 h4 text-white" >
                <div class="col-md-4 ">
                    Liste UserStories  Par Profile
                </div>
                <div class="col-md text-end">
                    <a href="{{route("home")}}"><button class="btn-sm btn-primary">Retour</button></a>
                </div>
            </div>

            <div class="col-md-4 p-4">
                <div class="col-md">
                    <table class="table border-2">
                        <thead>
                        <tr>
                            <th>NomProfile</th>
                            <th>RoleProfile</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td>{{$profileFound->nomUtilisateur}}</td>
                        <td>{{$profileFound->role}}</td>
                        </tbody>
                    </table>
                </div>
                <div class="col-md mt-5">
                    <div class="container-fluid  p-2 rounded bg-primary bg-gradient bg-gradient-to-b text-center fw-bold text-white">
                        Ajouter UserStorie A Ce Profile
                    </div>
                    <form action="{{route("ajouterUserStorie",$profileFound->id)}}" class="form-group" method="post">
                        @csrf
                        <div class="col-md py-2">
                            <input type="text" name="nomUserStorie" id="" placeholder="Ajouter Nom UserStorie" class="form-control">
                            @error("nomUserStorie")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md py-2">
                            <textarea name="description"  placeholder="Ajouter Description ..." id="" cols="20" rows="5" class="form-control"></textarea>
                            @error("description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md py-2">
                            <input type="submit" value="Ajouter Storie" class="btn-sm bg-primary btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8 p-4 ">
               @if(Session::has("message"))
                <div class=" alert-success text-center fw-bold h5 rounded my-2 p-2 container">
                        {{Session::get("message")}}
                </div>
                @endif
               @if(count($userStories)>0)
                    <table class="table  border bordred-2">
                        <thead>
                        <th>Nom UserStorie</th>
                        <th>Description</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($userStories as $story)
                            <tr>
                                <td>{{$story->nomUserStorie}}</td>
                                <td>{{$story->Description}}</td>
                                <td>
                                    <form action="{{route("supprimerUserStorie",$story->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn-sm btn-danger bg-danger">Supprimer</button>
                                    </form>

                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                @else
                <div class="bg-primary bg-gradient text-white p-4 rounded fw-bold text-dark h4 text-center w-75 mx-auto">
                    Ajouter Une UserStorie
                </div>
                   @endif
            </div>
        </div>
    </div>

@endsection
