@extends('ats.preliminary_application.layout')

<!-- Main Content -->
@section('preliminary_application_content')
    <a class="btn btn-default" href="/ats/report/aggregated">Aggregated</a><br>
    <div class="row">
       <div>
           <table id="myTable" class="table table-responsive table-striped table-bordered">
               <thead>
               <tr>
                   <th>District</th>
                   <th>Preliminary Total</th>
                   <th>Preliminary Male</th>
                   <th>Preliminary Female</th>
                   <th>Phone Interview Total</th>
                   <th>Phone Interview Male</th>
                   <th>Phone Interview Female</th>
               </tr>
               </thead>

               <tfoot>
               <tr>
                   <th>District</th>
                   <th>Preliminary Total</th>
                   <th>Preliminary Male</th>
                   <th>Preliminary Female</th>
                   <th>Phone Interview Total</th>
                   <th>Phone Interview Male</th>
                   <th>Phone Interview Female</th>
               </tr>
               </tfoot>

               <tbody>
               @foreach($query as $row)
                   <tr>
                       <td>{{$row->district}}</td>
                       <td>{{$row->total}}</td>
                       <td>{{$row->males}}</td>
                       <td>{{$row->females}}</td>
                       <td>{{$row->total2}}</td>
                       <td>{{$row->males2}}</td>
                       <td>{{$row->females2}}</td>
                   </tr>
               @endforeach
               </tbody>

           </table>
       </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
@endsection


