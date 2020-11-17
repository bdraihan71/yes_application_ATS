@extends('ats.report.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <h1>Aggregated</h1>
    <div class="row">
       <div>
           <table class="table table-responsive table-striped table-bordered">
               <tr>
                   <th>Preliminary Total</th>
                   <th>Preliminary Male</th>
                   <th>Preliminary Female</th>
                   <th>Phone Interview Total</th>
                   <th>Phone Interview Male</th>
                   <th>Phone Interview Female</th>
               </tr>
               @foreach($query as $row)
               <tr>
                   <td>{{$row->total}}</td>
                   <td>{{$row->males}}</td>
                   <td>{{$row->females}}</td>
                   <td>{{$row->total2}}</td>
                   <td>{{$row->males2}}</td>
                   <td>{{$row->females2}}</td>
               </tr>
               @endforeach
           </table>
       </div>
    </div>
@endsection
