@extends('layouts.app')

@section('content')
    <div>
        <!--
        <h1>
            Index
            {{$categories}}
            {{$dishes}}

        </h1>
    -->
        <table class="table table-bordered table-white">
            <thead>
              <tr>
                <th class="align-middle text-center" scope="col">ID</th>
                <th class="align-middle text-center" scope="col">name</th>
              </tr>
            </thead>
        
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th class="align-middle text-center" scope="row">{{$category["id"]}}</th>
                        <td class="align-middle text-center">{{$category["name"]}}</td>
                        <td class="align-middle text-center"><a ><button type="button" class="btn btn-secondary">TEST</button></a></td>
                        <td class="align-middle text-center"><a ><button type="button" class="btn btn-secondary">TEST</button></a></td>
                        <td class="align-middle text-center">
                          
                        </td>
                     </tr>
                @endforeach
            </tbody>
          </table>
        
          <div class="text-center my-5">
            <a ><button type="button" class="btn btn-secondary">Aggiungi piatto al menù</button></a>
          </div>
    </div>
@endsection