@extends('layouts.main')

@section('content')

    {{-- @parent override with login  card below--}}

    <div class="container">
        <div class="row">
            <div class="col">
                <p>This is where the awesome pitch goes for joining up.</p>
                <a href="/login/google">
                    Log In With Google
                </a>
                <a href="/login/facebook">
                    Log In With Facebook
                </a>
            </div>
        </div>
    </div>

@endsection