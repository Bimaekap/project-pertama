<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app-siswa');
    }

    public function dashboardSiswa()
    {   
        $studentId = Student::where('user_id',auth()->user()->id)->first()->id;
        // $student = Student::find($studentId);
        $student = Student::where('id',$studentId)->with('kelases')->get();
        $siswa = Student::find($studentId);
        $xx = $siswa->kelases()->get(); 
        $array = $xx->map(function($data){
            return $data->id;
        })->all();
   
        $f = $array;
        // dd($f);
        // dd($dataGuru);
        $dataTableSubject = Subject::whereIn('kelas_id',$f)->get();
        // $dataTeacher = Teacher::all()->where('id',$teacherId);
        // dd($dataTableSubject);
        return view('content.siswa.dashboard-siswa',compact('dataTableSubject'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
