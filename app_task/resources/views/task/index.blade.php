@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tasks <a href="{{route('task.create')}}" class="float-right">New</a></div> 
                

                    <a href="{{route('task.exportation', ['extensao' => 'xlsx'])}}" class="mr-3">XLSX</a>
                    <a href="{{route('task.exportation', ['extensao' => 'csv'])}}"  class="mr-3">CSV</a>
                    <a href="{{route('task.exportation', ['extensao' => 'pdf'])}}">PDF</a>

                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Task</th>
                                <th scope="col">Date limit conclusion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $key => $t)
                                <tr>
                                    <th scope="row">{{ $t['id'] }}</th>
                                    <td>{{ $t['task'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($t['date_limit_conclusion'])) }}</td>
                                    <td><a href="{{ route('task.edit', $t['id']) }}">Editar</a></td>
                                    <td>
                                        <form id="form_{{$t['id']}}" method="post" action="{{ route('task.destroy', ['task' => $t['id']]) }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.getElementById('form_{{$t['id']}}').submit()">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tasks->previousPageUrl() }}">Previous</a></li>

                            @for($i = 1; $i <= $tasks->lastPage(); $i++)
                                <li class="page-item {{ $tasks->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $tasks->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            
                            <li class="page-item"><a class="page-link" href="{{ $tasks->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
