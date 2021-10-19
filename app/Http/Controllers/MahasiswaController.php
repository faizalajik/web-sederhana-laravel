<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use DB;
class MahasiswaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index() {

		$mahasiswa = Mahasiswa::all();
		return view('daftar', compact("mahasiswa"));
	}
	public function input(Request $request) {

		$request->validate([
			'nama' => 'required',
			'jk' => 'required',
			'jurusan' => 'required',
			'status' => 'required',
			]);
		$nama = $request->input('nama');
		$jk = $request->input('jk');
		$jurusan = $request->input('jurusan');
		$status = $request->input('status');

		$post = new Mahasiswa;
		$post->nama_mahasiswa = $nama;
		$post->jk = $jk;
		$post->jurusan = $jurusan;
		$post->status = $status;
		$post->save();

		$request
		->session()
		->flash('success_message', 'Success create new post!');

		return redirect('/mahasiswa/show');
		
	}
	public function edit(Request $request)
	{

		$data = Mahasiswa::find ( $request->id);
		$data->nama_mahasiswa = $request->nama;

		$data->save ();
		return redirect('/mahasiswa/show');
		
	}
	public function delete(Request $request, $id)
	{
		echo $id;
		Mahasiswa::destroy($id);

		return redirect('/mahasiswa/show');
	}
}
