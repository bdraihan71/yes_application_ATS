<table class="table table-hover table-bordered table-striped table-responsive table-sm">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        @foreach($criterion as $criteria)
            <td>{{$criteria->label}} </td>
        @endforeach
        <td>Notes</td>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        @include('ats.partials.preliminary_report')
    @endforeach
    </tbody>

</table>