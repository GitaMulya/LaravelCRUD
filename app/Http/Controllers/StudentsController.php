<?php

namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;
use App\Rules\Uppercase;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
        return redirect('/students')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'NIM'=> 'required',
            'Nama'=> 'required',
            'Kelas'=> ['required', 'string', new Uppercase],
            'Nilai'=> 'required',
        ]);

        Student::where('id', $student->id)
            ->update([
                'NIM' => $request->NIM, 
                'Nama' => $request->Nama,
                'Kelas' => $request->Kelas,
                'Nilai' => $request->Nilai
            ]);
        return redirect('/students')->with('status', 'Data Berhasil Diubah');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Berhasil Dihapus');
    }
}
