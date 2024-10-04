<?php
namespace App\Http\Controllers;

use App\Models\peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required'
        ]);

        $peserta = peserta::create($validated);

        // Kirim email ke peserta
        Mail::raw("Halo {$peserta->nama}, terima kasih telah mendaftar!", function ($message) use ($peserta) {
            $message->to($peserta->email)
                    ->subject('Pendaftaran Berhasil');
        });

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan dan email terkirim!');
    }

    public function edit($id)
    {
        $peserta = peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required'
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