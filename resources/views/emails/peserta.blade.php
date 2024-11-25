
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berhasil</title>
</head>
<body>
        <h1>Assalamu'alaikum, {{ $peserta->nama }}</h1>
        <p>Terima kasih telah mendaftar di pengajian kami.</p>
        <p>Detail Pendaftaran:</p>
    <ul>
        <li>Nama : {{ $peserta->nama }}</li>
        <li>Email : {{ $peserta->email }}</li>
        <li>No Telepon : {{ $peserta->telepon }}</li>
        <li>Alamat : {{ $peserta->alamat }}</li>
        <li>Jenis Kelamin : {{ $peserta->jenis_kelamin }}</li>
        <li>Catatan : {{ $peserta->catatan }}</li>
        <h3>Barcode Token : {{ $peserta->token}}</h3>
    </ul>

    <p>Terima kasih!</p>
</body>
</html>
