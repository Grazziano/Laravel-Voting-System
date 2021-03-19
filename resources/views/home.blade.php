@extends('layouts.main')
@section('content')
    @include('flash')

    <div class="container">
        <h3 class="text-center mt-3">Lastest results</h3>
        @foreach ($candidates as $candidate)
            <div class="card mb-3 mt-3">
                <div class="card-body">
                    Candidate name: {{ $candidate->name }}
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ ($candidate->votes / 10000) * 100 }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="10000">{{ ($candidate->votes / 10000) * 100 }}%</div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

@endsection
