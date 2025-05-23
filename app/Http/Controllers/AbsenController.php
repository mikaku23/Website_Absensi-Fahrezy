<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Local;
use App\Models\Siswa;
use App\Models\Mengabsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_local', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal_absen', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $locals = local::all();

        return view('guru.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'locals' => $locals
        ]);
    }

    public function create(Request $request)
    {
        $query = Siswa::with('local');

        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_local', $request->kelas);
        }

        $datasiswa = $query->get();
        $locals = Local::all();

        return view('guru.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'locals' => $locals
        ]);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('username', Auth::user()->username)->first();

        $sudahAbsen = [];

        foreach ($statuses as $id => $status) {
            $siswa = Siswa::findOrFail($id);

            // Cek apakah siswa sudah absen hari ini
            $sudah = Mengabsen::where('id_siswa', $id)
                ->where('tanggal_absen', $currentDate)
                ->exists();

            if ($sudah) {
                $sudahAbsen[] = $siswa->nama; // Tambah ke daftar peringatan
                continue; // Lewati siswa ini
            }

            // Update status di tabel siswa
            $siswa->status = $status;
            $siswa->save();

            // Simpan absen baru
            Mengabsen::create([
                'tanggal_absen' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        if (count($sudahAbsen) > 0) {
            return redirect()->route('absen.index')->with('warning', 'Beberapa siswa sudah diabsen hari ini: ' . implode(', ', $sudahAbsen));
        }

        return redirect()->route('absen.index')->with('success', 'Status siswa dan tanggal absen berhasil diperbarui.');
    }

    public function edit($id)
    {
        $mengabsen = Mengabsen::with('siswa.local')->findOrFail($id);
        return view('guru.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'mengabsen' => $mengabsen
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $mengabsen = Mengabsen::findOrFail($id);
        $mengabsen->status = $validasi['status'];

        // Update id_guru with the logged-in guru's ID
        $guru = Guru::where('username', Auth::user()->username)->first();
        $mengabsen->id_guru = $guru->id;

        $mengabsen->save();

        $siswa = siswa::findOrFail($mengabsen->id_siswa);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absen.index'))->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function indexWalikelas(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_local', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal_absen', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $locals = Local::all();

        return view('walikelas.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'locals' => $locals
        ]);
    }

    public function createWalikelas(Request $request)
    {
        $query = Siswa::with('local');

        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_local', $request->kelas);
        }

        $datasiswa = $query->get();
        $locals = Local::all();

        return view('walikelas.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'locals' => $locals
        ]);
    }

    public function membuat(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('username', Auth::user()->username)->first();

        $sudahAbsen = [];

        foreach ($statuses as $id => $status) {
            $siswa = Siswa::findOrFail($id);

            // Cek apakah siswa sudah absen hari ini
            $sudah = Mengabsen::where('id_siswa', $id)
                ->where('tanggal_absen', $currentDate)
                ->exists();

            if ($sudah) {
                $sudahAbsen[] = $siswa->nama; // Tambah ke daftar peringatan
                continue; // Lewati siswa ini
            }

            // Update status di tabel siswa
            $siswa->status = $status;
            $siswa->save();

            // Simpan absen baru
            Mengabsen::create([
                'tanggal_absen' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        if (count($sudahAbsen) > 0) {
            return redirect()->route('absenWalikelas.index')->with('warning', 'Beberapa siswa sudah diabsen hari ini: ' . implode(', ', $sudahAbsen));
        }

        return redirect()->route('absenWalikelas.index')->with('success', 'Status siswa dan tanggal absen berhasil diperbarui.');
    }

    public function indexSiswa(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_local', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal_absen', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $locals = local::all();

        return view('admin.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'locals' => $locals
        ]);
    }
    
public function destroy($id)
{
    // Temukan data absen berdasarkan ID
    $mengabsen = Mengabsen::findOrFail($id);

    // Hapus data absen
    $mengabsen->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('absenSiswa.index')->with('success', 'Data absen berhasil dihapus.');
}
}
