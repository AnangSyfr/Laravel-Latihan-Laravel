<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('students.index',compact('students'));
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
            'nama'  => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'nim'   => 'required|size:9'
        ]);
        $path_dir = 'public/uploads';
        $file = $request->file('photo');
        $filename = $file->store($path_dir);
        Student::create([
            'photo' => $filename,
            'nama'  => $request->nama,
            'nim'   => $request->nim,
            'email' => $request->email
        ]);
        return redirect('/students')->with('success','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.detail',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama'  => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'nim'   => 'required|size:9'
        ]);
        $path_dir = 'public/uploads';
        $file = $request->file('photo');
        $filename = $file->store($path_dir);
        if ($request->hasFile('photo')) {
            Storage::delete($student->photo);
            $upd_data = [
                'photo' => $filename,
                'nama'  => $request->nama,
                'nim'   => $request->nim,
                'email' => $request->email
            ];
        } else {
            $upd_data = [
                'nama'  => $request->nama,
                'nim'   => $request->nim,
                'email' => $request->email
            ];
        }
        Student::find($student->id)->update($upd_data);
        return redirect('/students')->with('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        Storage::delete($student->photo);
        return redirect('/students')->with('success','Data Berhasil Dihapus!');
    }
}
