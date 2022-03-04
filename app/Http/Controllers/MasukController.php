<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masuk;
use File;
use Response;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Masuk::all();
        return view('masuk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'lampiran' => 'required|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('lampiran');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'files';
		$file->move($tujuan_upload,$nama_file);
		Masuk::create([
            'nomor' => $request->asal,
            'tanggal' => $request->tanggal,
			'lampiran' => $nama_file,
			'pengirim' => $request->pengirim,
			'perihal' => $request->perihal,
			'kategori' => $request->kategori,
			'keterangan' => $request->keterangan,
			'disposisi' => $request->disposisi,
			'perihal_disposisi' => $request->perihal_disposisi,
			'tujuan' => $request->tujuan
		]);
        return redirect()->route('masuk.index');

        // dd($request->all(),$request->file('lampiran'),time()."_".$request->file('lampiran')->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get = Masuk::find($id);
        // dd($get->lampiran);
        return view('masuk.view', compact('get'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Masuk::find($id);
        // dd($get);
        return view('masuk.edit', compact('get'));
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
        // dd($request->all());
        if ($request->lampiran == null) {
            $get = Masuk::find($id);
            $nama_file = $get->lampiran;
        } else {
            $get = Masuk::find($id);
            $destinationPath = 'files/'.$get->lampiran;
            File::delete($destinationPath);

            $this->validate($request, [
                'lampiran' => 'required|max:2048',
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('lampiran');

            $nama_file = time()."_".$file->getClientOriginalName();

                      // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'files';
            $file->move($tujuan_upload,$nama_file);
        }

        $update = Masuk::find($id);
        $update->nomor = $request->asal;
        $update->tanggal = $request->tanggal;
        $update->lampiran = $nama_file;
        $update->pengirim = $request->pengirim;
        $update->perihal = $request->perihal;
        $update->kategori = $request->kategori;
        $update->keterangan = $request->keterangan;
        $update->disposisi = $request->disposisi;
        $update->perihal_disposisi = $request->perihal_disposisi;
        $update->tujuan = $request->tujuan;
        $update->save();

        return redirect()->route('masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Masuk::find($id);
        $get->delete();
        $destinationPath = 'files/'.$get->lampiran;
        File::delete($destinationPath);
        return redirect()->back();
    }

    public function download($id)
    {
        // dd($id);
        $get = Masuk::find($id);
        $filepath = public_path('files/'.$get->lampiran);
        return Response::download($filepath);
    }

    public function viewdatamasuk()
    {
        $data = Masuk::all();
        return view('masuk.viewdatamasuk', compact('data'));
    }

    public function viewdatamasukkasie()
    {
        $data = Masuk::all();
        return view('kasie.viewdatamasuk', compact('data'));
    }

    public function viewdatamasuklurah()
    {
        $data = Masuk::all();
        return view('lurah.viewdatamasuk', compact('data'));
    }

    public function masukkasie()
    {
        $data = Masuk::all();
        // dd($data);
        return view('kasie.indexkas', compact('data'));
    }

    public function masuklurah()
    {
        $data = Masuk::all();
        // dd($data);
        return view('lurah.indexkas', compact('data'));
    }

    public function statuskasiemasuk(Request $request, $id)
    {
        // dd($id);
        $update = Masuk::find($id);
        $update->status = $request->status;
        $update->save();

        return redirect()->route('masuk.index');
    }
}
