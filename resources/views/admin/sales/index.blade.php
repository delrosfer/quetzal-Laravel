@extends('layouts.backend.app')

@section('title', 'Total Sales')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Total Ventas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    REPORTE DE VENTAS TOTALES
                                    <small class="text-danger pull-right">
                                        <span class="badge badge-info">Ventas Totales : {{ $balance->sum('total') }} Quetzales</span>
                                        <span class="badge badge-success">Pago : {{ $balance->sum('pay') }} Quetzales</span>
                                        <span class="badge badge-warning">Saldo : {{ $balance->sum('due') }} Quetzales</span>
                                    </small>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Descripcion del Producto</th>
                                        <th>Imagen</th>
                                        <th>Nombre del Cliente</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Hora</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Descricion de Producto</th>
                                        <th>Imagen</th>
                                        <th>Nombre del Cliente</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Hora</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->product_name }}</td>
                                            <td>
                                                <img class="img-rounded" width="40" height="30" src="{{ URL::asset('storage/product/'. $order->image) }}" alt="{{ $order->product_name }}">
                                            </td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ number_format($order->total, 2) }}</td>
                                            <td>{{ date('d-M-Y h:i:s A', strtotime($order->created_at)) }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem({{ $order->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form id="delete-form-{{ $order->id }}" action="{{ route('admin.expense.destroy', $order->id) }}" method="post"
                                                      style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div> <!-- Content Wrapper end -->
@endsection




@push('js')

    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>


    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>


    <script type="text/javascript">
        function deleteItem(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: '¿Esta Seguro?',
                text: "No podra revertirlo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelado',
                        'Sus datos estan seguros :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endpush