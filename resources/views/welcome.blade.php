@extends("layouts.master")
@section("content")
    <div class="container-fluid">
        <div class="row ">
            <div class="container bg-dark text-white  text-center py-2 flex">

                <div class="col-md-3">
                    Liste Des Profiles
                </div>
                <div class="col-md-3">
                    <a href="{{url("/tele")}}" target="_blank">Show details</a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('allTables')}}" >Gestion des tables DB </a>
                </div>
                <div class="col-md text-end ">
                    Profiles :
                    ({{count($profiles)}})
                </div>

            </div>


        </div>
        <div class="row">
            <div class="col-md-7 py-2 mt-3 rounded-md">
                @if(Session::has("message"))
                <div class="container-fluid text-center alert-primary text-black fw-bold h-2 p-2 my-2 rounded-top">
                    {{Session::get("message")}}
                </div>
                @endif
                <table id="profilesTable" class="table  border-2 rounded-2">
                    <thead>
                    <tr>
                        <th scope="col">Profile_ID</th>
                        <th scope="col">Nom Profile</th>
                        <th scope="col">Role</th>
                        <th scope="col">UserStories</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $p)

                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td>{{$p->nomUtilisateur}}</td>
                            <td>{{$p->role}}</td>
                            <td><a href="{{route("afficherUserStories",$p->id)}}"><button class="btn-sm btn-success">Afficher </button> </a></td>
                            <td>
                                <form  action="{{route("supprimerProfile",$p->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn-sm btn-danger" id="delete" >Supprimer</button>
                                </form>

                            </td>
                        </tr>

                    @endforeach



                    </tbody>
                </table>
            </div>
            <div class="col-md-5 py-2">
                <div class="row">
                   <div class="container text-center  rounded p-2">
                       Ajouter Profile
                   </div>
                    <form action="{{route("ajouterProfile")}}" method="post">
                        @csrf
                        <div class="col-md py-2">
                            <input type="text" name="nomUtilisateur"  placeholder="Ajouter Nom Profile " id="" class="form-control">
                            @error('nomUtilisateur ')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md py-2">
                            <select name="role" id="" class="form-select">
                                <option value="selectValue">Selectioner Un Role </option>
                                <option value="FP">Formateur Permanant </option>
                                <option value="FV">Formateur Vacataire  </option>
                                <option value="DEFP">DEFP : DIRECTEUR D'ETABLISSEMENT DE FORMATION </option>
                                <option value="DCF">DCF: DIRECTEUR DE COMPLEXE DE FORMATION </option>
                                <option value="GS">GS : gestionnaire des stagiaires </option>
                                <option value="DR">DR: DIRECTEUR REGIONAL </option>
                                <option value="SCQ">SCQ: SERVICE CONTROL DE QUALITE </option>
                                <option value="RRH">RRH: RESPONSABLE RESSOURCES HUMAINES </option>
                                <option value="DRH">DRH: DIRECTION DES RESSOURCES HUMAINES </option>
                                <option value="SD">SD: SECRETAIRE DE DIRECTION </option>

                            </select>
                            @if(Session::has("messageForme"))
                                <span class="text-danger pt-1">
                                    {{Session::get("messageForme")}}
                                </span>
                            @endif

                        </div>
                        <div class="col py-2">

                            <input type="submit" value="Ajouter" class="btn-sm bg-primary btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
@push("scripts")
    <script type="module">
        $(document).ready(function(){
            console.log("coucou")
            $("#profilesTable").DataTable();
        })
    </script>

@endpush
