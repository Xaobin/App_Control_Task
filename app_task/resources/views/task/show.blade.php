@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $task->task }}</div>

                <div class="card-body">
                    <fieldset disabled>
                        <div class="mb-3">
                            <label class="form-label">Date limit conclusion</label>
                            <input type="date" class="form-control" value="{{ $task->date_limit_conclusion }}">
                        </div>
                    </fieldset>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
