<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Form Daftar</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Daftar Mahasiswa</h5>
                            </div>
                            <div class="col-6" style="text-align: right">
                                <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>IPK</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->nim }}</td>
                                            <td>{{ $row->nama_lengkap }}</td>
                                            <td>{{ $row->tanggal_lahir }}</td>
                                            <td>{{ $row->ipk }}</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#edit{{ $row->nim }}">
                                                    <a href="#" class="text-light"><span class="fa fa-user-pen"></span></a></a>
                                                </span>
                                                <span class="badge rounded-pill bg-danger">
                                                    <a href="/hapus/{{ $row->nim }}" class="text-light" onclick="return confirm('Apakah anda ingin menghapus data?')"><span class="fa fa-trash-can"></span></a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- VALIDATION -->
            {{-- <div class="col-lg-3 mt-3">
                @if (count($errors->getBags()))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->getBags() as $bag)
                        @foreach ($bag->getMessages() as $messages)
                        @foreach ($messages as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endforeach
                        @endforeach
                    </ul>
                </div>
                @endif
                <div style="height: 100px;">
                    <?php
                    dump($errors);
                    ?>
                </div>
            </div> --}}
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/prosestambah" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>NIM :</label>
                    <input type="text" class="form-control" name="nim" id="nim">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap :</label>
                    <input type="text" class="form-control" name="nama_lengkap">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir :</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>
                <div class="form-group">
                    <label>Ipk :</label>
                    <input type="number" class="form-control" step="0.1" name="ipk">
                </div>

                <div class="row mt-2">
                    <div class="col-12" style="text-align:right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  @foreach ($data as $row )
  <div class="modal fade" id="edit{{ $row->nim }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/prosesedit" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>NIM :</label>
                    <input type="text" class="form-control" value="{{ $row->nim }}" name="nim" id="nim" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap :</label>
                    <input type="text" class="form-control" value="{{ $row->nama_lengkap }}" name="nama_lengkap">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir :</label>
                    <input type="date" class="form-control" value="{{ $row->tanggal_lahir }}" name="tanggal_lahir">
                </div>
                <div class="form-group">
                    <label>Ipk :</label>
                    <input type="number" class="form-control" value="{{ $row->ipk }}" step="0.1" name="ipk">
                </div>

                <div class="row mt-2">
                    <div class="col-12" style="text-align:right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

