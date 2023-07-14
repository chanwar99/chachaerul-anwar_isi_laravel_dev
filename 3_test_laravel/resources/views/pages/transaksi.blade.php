@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <form id="filter-form">
                        <div class="row align-items-end">
                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">-- All Status --</option>
                                    <option value="S">Succcess</option>
                                    <option value="F">Failed</option>
                                    <option value="P">Pending</option>
                                    <option value="R">Refund</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 ">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="transaksi-table" class="table table-bordered table-striped mt-4 text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merchant Name</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.content -->
    </div>

    @push('data-table-scripts')
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script>
            $(function() {
                var table = $('#transaksi-table').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false,
                    lengthChange: false,
                    ordering: false,
                    pageLength: 5,
                    ajax: {
                        url: "{{ route('transaksi.getData') }}",
                        data: function(d) {
                            d.status = $('select[name=status]').val();
                        }
                    },
                    columns: [{
                            data: 'id',
                            name: null,
                            render: (data, type, row, meta) => meta.row + 1
                        }, {
                            data: 'merchant.name',
                            name: 'merchant.name'
                        },
                        {
                            data: 'nominal',
                            name: 'nominal'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                    ],
                });

                $('#filter-form').on('submit', function(e) {
                    e.preventDefault();
                    table.ajax.reload();
                });
            });
        </script>
    @endpush
@endsection
