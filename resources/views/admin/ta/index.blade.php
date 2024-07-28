@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dt-responsive" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Judul</th>
                                    <th>Translate</th>
                                    <th>Abstrak</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="accModal" tabindex="-1" role="dialog" aria-labelledby="accModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accModalLabel">Set Tanggal Sidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="accForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tanggal_sidang">Tanggal Sidang</label>
                            <select class="form-control" id="tanggal_sidang" name="tanggal_sidang" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                            <input type="hidden" id="tesis_id" name="tesis_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-custom')
    <script>
        $(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.ta.getdata') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'translate',
                        name: 'translate'
                    },
                    {
                        data: 'abstrak',
                        name: 'abstrak'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Event listener untuk tombol Acc
          // Event listener untuk tombol Acc
    $(document).on('click', '.acc-button', function() {
        var id = $(this).data('id');
        $('#tesis_id').val(id);

        // Mendapatkan tanggal sidang dari controller
        $.ajax({
            url: "{{ route('admin.ta.gettanggal') }}",
            method: 'GET',
            success: function(response) {
                var options = '';
                response.forEach(function(tanggal) {
                    options += '<option value="' + tanggal + '">' + tanggal + '</option>';
                });
                $('#tanggal_sidang').html(options);
                $('#accModal').modal('show');
            },
            error: function(response) {
                var errorMessage = response.responseJSON ? response.responseJSON.message : 'An error occurred';
                alert('Error: ' + errorMessage);
            }
        });
    });

            // Handle form submission untuk update status
            $('#accForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#tesis_id').val();
                var tanggal_sidang = $('#tanggal_sidang').val();

                $.ajax({
                    url: "{{ route('admin.ta.updatestatus') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        tanggal_sidang: tanggal_sidang
                    },
                    success: function(response) {
                        $('#accModal').modal('hide');
                        table.ajax.reload();
                        alert(response.message);
                    },
                    error: function(response) {
                        var errorMessage = response.responseJSON ? response.responseJSON
                            .message : 'An error occurred';
                        alert('Error: ' + errorMessage);
                    }
                });

            });
        });
    </script>
@endsection
