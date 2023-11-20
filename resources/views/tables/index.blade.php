@extends("layouts.master")
@section("content")

    <div class="container-fluid ">
        <div class="row">
            <div class="container flex bg-dark p-3 h4 text-white" >
                <div class="col-md-4 ">
                    Liste Of All Tables
                </div>
                <div class="col-md text-end">
                    <a href="{{route("home")}}"><button class="btn-sm btn-primary">Retour</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 py-2">
                <div class="row">
                    <form action="{{route("addTable")}}" method="post">
                        @csrf
                        <div class="col-md py-2 mt-4">
                            <input type="text" name="tableName"  placeholder="Ajouter un tableau  " id="" class="form-control">
                            @error('tableName ')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col py-2">
                            <input type="submit" value="Ajouter tableau" class="btn-sm bg-primary btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table  border-1 mt-2">
                    <thead>
                    <tr>
                        <th width="500">table name </th>
                        <th>table details</th>
                        <th>table action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($tables as $t)
                       <tr>
                           <td width="">{{$t->tableName}} </td>
                           <td><a href="{{route("allAttributs",$t)}}"><button class="btn-sm bg-success btn-success">Afficher details</button></a> </td>
                           <td>
                               <form action="{{route("delTable",$t)}}" method="post">
                                   @csrf
                                   @method("DELETE")
                                   <input type="submit" value="supprimer" class="btn-sm bg-danger btn-danger">
                               </form>
                           </td>

                       </tr>
                   @endforeach

                    </tbody>
                </table>



            </div>

        </div>
    </div>



@endsection
