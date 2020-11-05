@extends('layouts.app')

<!-- Main Content -->
@section('content')
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/ats/final/">Stacks</a></li>
                {{-- <li><a href="/ats/final/backup">Backup</a></li> --}}
                <li><a href="/ats/final/score-sheet">Score Now!</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('final_content')
        </div>
    </div>
@endsection
