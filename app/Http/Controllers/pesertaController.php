<?php

namespace App\Http\Controllers;

use App\Models\peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\PesertaNotification;

class pesertaController extends Controller
{
    public function index()
    {
        $pesertas = peserta::all();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $ihkwanCount = Peserta::where('jenis_kelamin', 'Ihkwan')->count();
        $ahkwatCount = Peserta::where('jenis_kelamin', 'Ahkwat')->count();

        // Validasi batas pendaftaran
        if ($request->jenis_kelamin === 'Ihkwan' && $ihkwanCount >= 10) {
            return back()->with('error', 'Pendaftaran untuk Ihkwan sudah penuh!');
        }

        if ($request->jenis_kelamin === 'Ahkwat' && $ahkwatCount >= 8) {
            return back()->with('error', 'Pendaftaran untuk Ahkwat sudah penuh!');
        }
         $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Ihkwan,Ahkwat',
        ]);

        $peserta = peserta::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Set zona waktu (WIB) dan format tanggal & waktu
        $now = Carbon::now('Asia/Jakarta')->format('d M Y, H:i');

        $peserta->catatan = 'Peserta ' . $request->nama . ' telah mendaftar pada ' . $now . ' 
        Semoga anda dapat berkontribusi dalam kegiatan Pengajian ini.';
        $peserta->save();

        // Kirim email dengan PesertaNotification
        Mail::to($peserta->email)->send(new PesertaNotification($peserta));

        return redirect()->route('peserta.detail', $peserta->id)->with('success', 'Peserta berhasil ditambahkan dan email terkirim!');
    }

    public function edit($id)
    {
        $peserta = peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    public function show($id)
    {
        $peserta = peserta::findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function detail($id)
    {
        $peserta = peserta::findOrFail($id);
        return view('peserta.detail', compact('peserta'));
    }

    public function showQRCode(Peserta $peserta)
{
    // Generate QR code dalam format base64
    $qrCode = QrCode::size(200)->generate($peserta->token);

    // Tampilkan halaman dengan QR code
    return view('peserta.qrcode', compact('peserta', 'qrCode'));
}



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|string|in:Ihkwan,Ahkwat',
        ]);

        $peserta = peserta::findOrFail($id);
        $peserta->update($validated);

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diupdate');
    }

    public function destroy($id)
    {
        peserta::destroy($id);
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus');
    }
}
