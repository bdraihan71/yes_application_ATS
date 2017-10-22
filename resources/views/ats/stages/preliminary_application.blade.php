@extends('ats.layout')

<!-- Main Content -->
@section('ats_content')
    <style>

    </style>
    <div class="panel panel-default">
        <div class="panel-heading">Preliminary Application</div>

        <div class="panel-body">
            <h3>Not Scored</h3>
            @if(count($not_scored)>0)
                <div class="container">
                    <table class="table table-responsive table-sm">
                        <thead>
                            <tr class="row">
                                <td>ID</td>
                                <td>Name</td>
                                @foreach($criterion as $criteria)
                                    <td>{{$criteria->label}} </td>
                                @endforeach
                                <td>Notes</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        @foreach($not_scored as $student)
                            @include('ats.partials.preliminary_form')
                        @endforeach
                    </table>
                </div>
            @else
                <p>All students has been scored</p>
            @endif


            <h3>Passed</h3>
            <table class="table table-responsive table-sm">
                <thead>
                <tr class="row">
                    <td>ID</td>
                    <td>Name</td>
                    @foreach($criterion as $criteria)
                        <td>{{$criteria->label}} </td>
                    @endforeach
                    <td>Notes</td>
                    <td>Actions</td>
                </tr>
                </thead>
                @foreach($students as $student)
                    @include('ats.partials.preliminary_form')
                @endforeach
            </table>

            @if(isset($students_failed))
            <h3>Failed</h3>
            {{--@foreach($students_failed as $student)--}}
            {{--{{$student->id}} {{$student->first_name}} <br>--}}
            {{--@endforeach--}}



            <div class="container">
                <table class="table table-responsive table-sm">
                    <thead>
                    <tr class="row">
                        <td>ID</td>
                        <td>Name</td>
                        @foreach($criterion as $criteria)
                            <td>{{$criteria->label}} </td>
                        @endforeach
                        <td>Notes</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    @foreach($students_failed as $student)
                        @include('ats.partials.preliminary_form')
                    @endforeach
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection
