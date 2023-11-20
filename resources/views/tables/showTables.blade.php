@extends('layouts.master')
@section("content")



    <div class="container-fluid  ">
        <div class="row">
            <div class="container flex bg-dark p-3 h4 text-white" >
                <div class="col-md-4 ">
                    Liste Of Attributs For The Table :  ({{$table->tableName }})
                </div>
                <div class="col-md text-end">
                    <a href="{{route("allTables")}}"><button class="btn-sm btn-primary">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 py-2">
                <div class="row">
                    <form action="{{route("addAttribut",$table)}}" method="post">
                        @csrf
                        <h1 class="text-center h3">Details D'attribut</h1>
                        <div class="col-md py-2 mt-4">
                            <input type="text" name="nomAttribut"  placeholder="Ajouter une Attribut  " id="" class="form-control">
                            @error('nomAttribut')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md py-2 ">
                            <input type="text" name="type"  placeholder="Ajouter un type ...  " id="" class="form-control">
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col py-2">
                            <input type="submit" value="Ajouter Attribut" class="btn-sm bg-primary btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 mt-5 mx-auto">

                @if(Session::has("message"))
                    <div class="card">
                        <div class="card-header text-center capitalize fw-bold h3 alert-success">
                            {{Session::get("message")}}
                        </div>
                    </div>
                @endif
                <table class="table  border-1 mt-2">
                    <thead>
                    <tr>
                        <th width="">name Attribut </th>
                        <th>Type Attribut</th>
                        <th>Action Attibut</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attributs as $att)
                    <tr>
                        <td>{{$att->nomAttribut}}</td>
                        <td>{{$att->type}}</td>
                        <td>
                            <form method="post" action="{{route("deleteAttribut",$att)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Supprimer" class="btn btn-sm bg-danger btn-danger">
                            </form></td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>



            </div>

        </div>
    </div>
@endsection
