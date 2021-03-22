<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswa = Student::all();             
        $maxNilai = Student::max('Nilai');
        $minNilai = Student::min('Nilai');
        $rata2 = number_format(Student::average('Nilai'),3);
        $frekuensi = Student::select('Nilai', DB::raw('count(*) as frekuensi'))  
                            ->groupBy('Nilai')                             
                            ->get();
        $totalNilai = Student::sum('Nilai');              
        $totalfrekuensi = Student::count('Nilai');     
        if($request->has('cari')){
            $mahasiswa = Student::where('Nama','LIKE', '%'.$request->cari.'%')->get();
        }
        else{
            $mahasiswa = Student::all();
            }
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa,
                             'max' => $maxNilai, 
                             'min' => $minNilai, 
                             'rata2' => $rata2,
                             'frekuensi' => $frekuensi,
                             'totalNilai' => $totalNilai,
                             'totalfrekuensi' => $totalfrekuensi]);    

        // if($request->has('cari')){
        //     $mahasiswa = Student::where('Nama','LIKE', '%'.$request->cari.'%')->get();
        // }
        // else{
        //     $mahasiswa = Student::all();
        // }
        // //$mahasiswa = DB::table('mahasiswas')->get();
        // return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIM'=> 'required',
            'Nama'=> 'required',
            'Kelas'=> ['required', 'string', new Uppercase],
            'Nilai'=> 'required',
        ]);

        student::create([
            'NIM' => $request->NIM,
            'Nama' => $request->Nama,
            'Kelas' => $request->Kelas, 
            'Nilai' => $request->Nilai,
        ]);
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = Student::find($id);
        return view('mahasiswa.edit', ['mhs' => $mhs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mhs = Student::find($id);
        $mhs->update($request->all());
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $mhs = Student::find($id);
        // Student::destroy($mhs->id);
        // return redirect('/mahasiswa')->with('status', 'Data Berhasil Dihapus');
    }
    public function delete($id)
    {
        $mhs = Student::find($id);
        $mhs->delete();
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Dihapus');
    }
}
