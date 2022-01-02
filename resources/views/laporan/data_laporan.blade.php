@extends('layouts.index')

@section('content')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/date-1.1.1/datatables.min.css"/>
<div class="row">
    <div class="col-md-12">
     <table  id="table_id" class="display table table-bordered table-hover table-sm">
             <thead>
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Bulan</th>
                     <th scope="col">Total produk Terjual</th>
                     <th scope="col">Total Pendapatan</th>
                 </tr>
             </thead>
             <tbody>
             <?php $i=1?>
             @foreach($products as $product)
                 <tr>
                     <td scope="row">{{$i++}}</th>
                     <td>{{$product->tanggal_data}}</td>
                     <td>{{$product->total_qty}}</td>
                     <td>{{angka::titikPemisah($product->total_pendapatan)}}</td>
                    
                 </tr>
             @endforeach
             </tbody>
         </table>

         {{-- <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table> --}}
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatable/DataTables-1.11.3/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatable/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatable/datatables.min.js')}}"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                dom: 'B<"clear">lfrtip',
                buttons: true,
                buttons: {
                    name: 'primary',
                    buttons: [ 'copy', 'excel', 'pdf' ]
                }
            });
        } );
    </script>
@endsection