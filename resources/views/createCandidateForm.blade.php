@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('createCandidate') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group mb-3">
                <label for="">Candidate Name</label>
                <input type="text" name="candidateName" class="form-control" placeholder="Type the name of the candidate">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
