<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <head>
     <body>
      <div class="container mt-5">
       <div class="card">
           <div class="card-header text-center bg-primary text-white">
               <h3>Detail Peserta : {{ $peserta->nama }}</h3>
           </div>
           <div class="card-body">
               <table class="table table-bordered">
                   <tr>
                       <th>ID</th>
                       <td>{{ $peserta->id }}</td>
                   </tr>
                   <tr>
                       <th>Nama</th>
                       <td>{{ $peserta->nama }}</td>
                   </tr>
                   <tr>
                       <th>Email</th>
                       <td>{{ $peserta->email }}</td>
                   </tr>
                   <tr>
                       <th>Telepon</th>
                       <td>{{ $peserta->telepon }}</td>
                   </tr>
                   <tr>
                       <th>Alamat</th>
                       <td>{{ $peserta->alamat }}</td>
                   </tr>
               </table>
               <a href="{{ route('peserta.index') }}" class="btn btn-secondary mt-3">Kembali</a>
           </div>
       </div>
   </div>
  </head>
 </body>