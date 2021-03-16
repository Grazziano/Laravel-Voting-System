@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="">
            <fieldset class="form-group text-center">
                <div class="row">
                    <div class="col-sm-10" style="margin: 0 auto">

                        <h3 class="mt-3">Candidates to vote for:</h3>

                        <div class="form-check mb-5 mt-3">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Default radio
                            </label>
                        </div>

                        <div class="form-check mb-5">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Default radio
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 d-grid gap-2" style="margin: 0 auto">
                                <button type="submit" class="btn btn-block btn-primary">Vote</button>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
