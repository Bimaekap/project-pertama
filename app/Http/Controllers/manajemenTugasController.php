<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class manajemenTugasController extends Controller
{
    //
    public function halMateriTugas()
    {
        $x = DB::table('kelas_teacher')->where('teacher_id', Teacher::where('user_id', auth()->user()->id)->first()->id)->get();
        $data = $x->map(function ($s) {
            return $s->id;
        })->all();
        // dd($data)
        // dd($x);
        $getEvaluation = Evaluation::with('kelas')->whereIn('kelas_id', $data)->get();
        // dd($getEvaluation);
        return view('content.guru.manajemen-tugas.manajemen-tugas', compact('getEvaluation'));
    }

    public function penilaianTugas()
    {
        $x = DB::table('kelas_teacher')->where('teacher_id', Teacher::where('user_id', auth()->user()->id)->first()->id)->get();
        $data = $x->map(function ($s) {
            return $s->id;
        })->all();
        // dd($data)
        // dd($x);
        $getEvaluation = Evaluation::with('kelas')->whereIn('kelas_id', $data)->get();
        return view('popup.guru.manajemen-tugas.tambah-nilai', compact('getEvaluation'));
    }
}
