@extends('layouts.main')
@section('content')
    <style>
        .form-check .form-check-input {
            float: none;
        }
    </style>
    <div class="container">
        <form action="{{ route('castYourVote') }}" method="post">
            {{ csrf_field() }}
            <fieldset class="form-group text-center">
                <div class="row">
                    <div class="col-sm-10" style="margin: 0 auto">

                        <h3 class="mt-3">Candidates to vote for:</h3>

                        @foreach ($candidates as $candidate)
                            <div class="form-check mb-5 mt-3">
                                <input class="form-check-input" type="radio" name="candidateId" id="candidateId"
                                    value="{{ $candidate->id }}">
                                <label class="form-check-label" for="candidateId">
                                    {{ $candidate->name }}
                                </label>
                            </div>
                        @endforeach

                        <div class="form-group row">
                            <div class="col-sm-10 d-grid gap-2" style="margin: 0 auto">
                                <button type="submit" class="btn btn-primary">Vote</button>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
