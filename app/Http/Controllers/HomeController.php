<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $key = ['Lulus','DO','Belum Lulus'];
        for ($i=0;$i<3;$i++){
            $laki = Mahasiswa::select("*")
            ->where([
                ["jk", "=", "L"],
                ["status", "=", $key[$i]]
                ])
            ->count();
            $perem = Mahasiswa::select("*")
            ->where([
                ["jk", "=", "P"],
                ["status", "=", $key[$i]]
                ])
            ->count();
            $jurusan = Mahasiswa::select("*")
            ->where([
                ["jurusan", "=", "informatika"],
                ["status", "=", $key[$i]]
                ])
            ->count();

            $data [$key[$i]] = array("laki"=>$laki, "perempuan"=>$perem,"informatika"=>$jurusan);

        }
        return view('home', array("data" => $data));
    }
}
