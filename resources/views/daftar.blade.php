<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body class="container">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
    </nav>
    <h1 class="mt-4 mb-4" align="center"> Data Mahasiswa</h2>
      <div class="card center">
        <form class="form-inlane" action="{{ url('/mahasiswa/input') }}" method="post">
          @csrf
          <div class="card-header bg-primary text-white">Input Data Mahasiswa</div>
          <div class="card-body " >
            <div class="form-group mb-2">
              <label>Nama :</label>
              <input class="form-control-sm" type="text" name="nama" class="form-control">
              <label>Jenis Kelamin :</label>
              <input class="form-control-sm" type="text" name="jk">
              <label>Jurusan :</label>
              <input class="form-control-sm" type="text"  name="jurusan">
              <label>Status :</label>
              <input class="form-control-sm" type="text" name="status">

              <button type="submit" class="btn btn-primary btn-sm">Input</button>
            </div>

          </div>

        </form>

      </div>
      <br>
      <div class="card-header bg-primary text-white">Daftar Mahasiswa</div>
      <div class="card-body " >

        <div class="table-responsive">
          <table id="data_mahasiswa" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mahasiswa as $item)
              <tr>
                <td class="column_name" data-column_name="id" id="id" data-id="{{ $item->id_mahasiswa}}">{{ $item->id_mahasiswa }}</td>
                <td contenteditable class="column_name" id="nama_mahasiswa" data-column_name="nama" data-id="{{ $item->nama_mahasiswa}}">{{ $item->nama_mahasiswa }}</td>
                <td contenteditable class="column_name" id="jk" data-column_name="jk" data-id="{{ $item->jk}}">{{ $item->jk }}</td>
                <td contenteditable class="column_name" id="jurusan" data-column_name="jurusan" data-id="{{ $item->jurusan}}">{{ $item->jurusan}}</td>
                <td contenteditable class="column_name" id="status" data-column_name="status" data-id="{{ $item->status}}">{{ $item->status}}</td>
                <td> <button class="edit-modal btn btn-info" data-id="{{$item->id_mahasiswa}}"
                  data-name="{{$item->nama_mahasiswa}}">
                  <span class="glyphicon glyphicon-edit"></span> Edit
                </button> <button type="button" class="btn btn-danger btn-xs" id="delete" onclick="deleted({{ $item->id_mahasiswa}})"> Delete</button></td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div>

      </div>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id">ID:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fid" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="n">
                  </div>
                </div>
              </form>
              <div class="deleteContent">
                Are you Sure you want to delete <span class="dname"></span> ? <span
                class="hidden did"></span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn actionBtn" data-dismiss="modal">
                  <span id="footer_action_button" class='glyphicon'> </span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                  <span class='glyphicon glyphicon-remove'></span> Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <script>
          $(document).ready(function() {
            $('#data_mahasiswa').DataTable();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $(document).on('click', '.edit-modal', function() {
              $('#footer_action_button').text(" Update");
              $('#footer_action_button').addClass('glyphicon-check');
              $('#footer_action_button').removeClass('glyphicon-trash');
              $('.actionBtn').addClass('btn-success');
              $('.actionBtn').removeClass('btn-danger');
              $('.actionBtn').addClass('edit');
              $('.modal-title').text('Edit');
              $('.deleteContent').hide();
              $('.form-horizontal').show();
              $('#fid').val($(this).data('id'));
              $('#n').val($(this).data('name'));
              $('#myModal').modal('show');
            });

            $('.modal-footer').on('click', '.edit', function() {

              $.ajax({
                type: 'post',
                url: "{{ url('/mahasiswa/edit/') }}",
                data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'nama': $('#n').val()
                },
                success: function(data) {
                  $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
              });
            });

          });




          function deleted(id){
            var url = "{{ url('/mahasiswa/delete','id') }}";
            url = url.replace('id', id);
            if(window.confirm('Delete this entry')){
              window.location.href = url;
            }
          }
        </script>
      </body>
      </html>