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
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <p>Total Merchant: {{ $merchant_total }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    @foreach ($total_status as $total)
                                        <p>{{ 'Status: ' . $total->status . ', Total Status: ' . $total->total_nominal }}
                                        </p>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    @foreach ($averange_status as $avg)
                                        <p>{{ 'Status: ' . $avg->status . ', Averange Status: ' . $avg->averange_nominal }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- ./col -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.content -->
    </div>

    {{-- <!-- Modal untuk Create/Edit -->
    <div class="modal fade" id="createEditModal" tabindex="-1" role="dialog" aria-labelledby="createEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEditModalLabel">Create/Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk Create/Edit -->
                    <form id="createEditForm">
                        <input type="hidden" id="projectId" name="project_id">
                        <div class="form-group">
                            <label for="projectName">Project Name</label>
                            <input type="text" class="form-control" id="projectName" name="project_name" required>
                        </div>
                        <div class="form-group">
                            <label for="clientId">Client</label>
                            <select class="form-control" id="clientId" name="client_id" required>
                                <option value="">-- All Client --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectStart">Project Start</label>
                            <input type="date" class="form-control" id="projectStart" name="project_start" required>
                        </div>
                        <div class="form-group">
                            <label for="projectEnd">Project End</label>
                            <input type="date" class="form-control" id="projectEnd" name="project_end" required>
                        </div>
                        <div class="form-group">
                            <label for="projectStatus">Project Status</label>
                            <select class="form-control" id="projectStatus" name="project_status" required>
                                <option value="">-- All Status --</option>
                                <option value="OPEN">OPEN</option>
                                <option value="DOING">DOING</option>
                                <option value="DONE">DONE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @push('data-table-scripts')
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
        <script>
            $(function() {
                var table = $('#project-table').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false,
                    lengthChange: false,
                    ordering: false,
                    pageLength: 5,
                    ajax: {
                        url: "{{ route('project.getData') }}",
                        data: function(d) {
                            d.project_name = $('input[name=project_name]').val();
                            d.client_id = $('select[name=client_id]').val();
                            d.project_status = $('select[name=project_status]').val();
                        }
                    },
                    columns: [{
                            data: 'project_id',
                            name: 'project_id',
                            render: function(data) {
                                return '<input type="checkbox" class="select-checkbox" name="project_id[]" value="' +
                                    data +
                                    '">';
                            }
                        },
                        {
                            data: 'project_id',
                            name: 'project_id',
                            render: function(data) {
                                return '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#createEditModal" data-action="edit" data-id="' +
                                    data + '">Edit</button>';
                            }
                        },
                        {
                            data: 'project_name',
                            name: 'project_name'
                        },
                        {
                            data: 'client.client_name',
                            name: 'client.client_name'
                        },
                        {
                            data: 'project_start',
                            name: 'project_start',
                            render: function($data) {
                                return moment($data).format('DD MMM YYYY')
                            },
                        },
                        {
                            data: 'project_end',
                            name: 'project_end',
                            render: function($data) {
                                return moment($data).format('DD MMM YYYY')
                            },
                        },
                        {
                            data: 'project_status',
                            name: 'project_status'
                        }
                    ],
                });

                $('#filter-form').on('submit', function(e) {
                    e.preventDefault();
                    table.ajax.reload();
                });

                $('#reset-filter').on('click', function() {
                    $('#filter-form')[0].reset();
                    table.ajax.reload();
                });

                $('#check-all').on('click', function() {
                    $('.select-checkbox').prop('checked', this.checked);
                });

                $('#createEditModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var action = button.data('action');

                    var modal = $(this);
                    modal.find('.modal-title').text((action === 'add') ? 'Add Project' : 'Edit Project');

                    modal.find('#projectId').val('');
                    modal.find('#projectName').val('');
                    modal.find('#clientId').val('');
                    modal.find('#projectStart').val('');
                    modal.find('#projectEnd').val('');
                    modal.find('#projectStatus').val('');

                    if (action === 'edit') {
                        var projectId = button.data('id');
                        var url = "{{ route('project.edit', ['project_id' => ':project_id']) }}";
                        url = url.replace(':project_id', projectId);
                        $.ajax({
                            url: url,
                            method: 'GET',
                            success: function(response) {
                                var project = response.data;
                                modal.find('#projectId').val(project.project_id);
                                modal.find('#projectName').val(project.project_name);
                                modal.find('#clientId').val(project.client_id);
                                modal.find('#projectStart').val(project.project_start);
                                modal.find('#projectEnd').val(project.project_end);
                                modal.find('#projectStatus').val(project.project_status);
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });

                $('#createEditForm').on('submit', function(e) {
                    e.preventDefault();
                    var formData = $('#createEditForm').serialize();
                    var action = $('#createEditModal').find('.modal-title').text() === 'Add Project' ? 'add' :
                        'edit';
                    var url = (action === 'add') ? "{{ route('project.store') }}" :
                        "{{ route('project.update', ['project_id' => ':project_id']) }}";
                    url = url.replace(':project_id', $('#projectId').val());
                    $.ajax({
                        url: url,
                        data: formData,
                        method: (action === 'add') ? 'POST' : 'PUT',
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#createEditModal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                });

                $('#deleteSelectedButton').on('click', function() {
                    var selectedProjects = [];

                    $('input.select-checkbox:checked').each(function() {
                        selectedProjects.push($(this).val());
                    });


                    if (selectedProjects.length > 0) {
                        if (confirm('Are you sure you want to delete the selected projects?')) {
                            $.ajax({
                                url: "{{ route('project.destroy') }}",
                                method: 'DELETE',
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                data: {
                                    selectedProjects: selectedProjects
                                },
                                success: function(response) {
                                    table.ajax.reload();
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                }
                            });
                        }
                    } else {
                        alert('Please select at least one project to delete.');
                    }
                });
            });
        </script>
    @endpush --}}
@endsection
