@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add task</div>

                <div class="card-body">
                    <form method="post" action="{{ route('task.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Task</label>
                            <input type="text" class="form-control" name="task">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date limit conclusion</label>
                            <input type="date" class="form-control" name="date_limit_conclusion">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
