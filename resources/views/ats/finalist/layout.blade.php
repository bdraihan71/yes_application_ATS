@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/finalist/">Stacks</a></li>
                <li><a href="/ats/finalist/letter">Letter</a></li>
                <li><a href="/ats/finalist/envelope">Envelope</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('final_content')
        </div>
    </div>
@endsection
