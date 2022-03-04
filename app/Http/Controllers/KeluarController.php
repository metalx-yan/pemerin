<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;
use File;
use Response;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Keluar::all();
        return view('keluar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
			'lampiran' => 'required|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('lampiran');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'files';
		$file->move($tujuan_upload,$nama_file);
        $status = 0;
		Keluar::create([
            'nomor' => $request->asal,
            'tanggal' => $request->tanggal,
			'lampiran' => $nama_file,
			'pengirim' => $request->pengirim,
			'perihal' => $request->perihal,
			'kategori' => $request->kategori,
			'keterangan' => $request->keterangan,
			'status' => $status
		]);
        return redirect()->route('keluar.index');

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
        $get = Keluar::find($id);
        // dd($get->lampiran);
        return view('keluar.view', compact('get'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Keluar::find($id);
        // dd($get);
        return view('keluar.edit', compact('get'));
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
            $get = Keluar::find($id);
            $nama_file = $get->lampiran;
        } else {
            $get = Keluar::find($id);
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

        $update = Keluar::find($id);
        $update->nomor = $request->asal;
        $update->tanggal = $request->tanggal;
        $update->lampiran = $nama_file;
        $update->pengirim = $request->pengirim;
        $update->perihal = $request->perihal;
        $update->kategori = $request->kategori;
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect()->route('keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Keluar::find($id);
        $get->delete();
        $destinationPath = 'files/'.$get->lampiran;
        File::delete($destinationPath);
        return redirect()->back();
    }

    public function download($id)
    {
        // dd($id);
        $get = Keluar::find($id);
        $filepath = public_path('files/'.$get->lampiran);
        return Response::download($filepath);
    }

    public function statuskasie(Request $request, $id)
    {
        // dd($id);
        $update = Keluar::find($id);
        $update->status = $request->status;
        $update->save();

        return redirect()->route('keluar.index');
    }

    public function statuslurah(Request $request, $id)
    {
        // dd($request->all());
        $update = Keluar::find($id);
        $update->status = $request->status;
        $update->save();

        return redirect()->route('keluar.index');
    }

    public function statusadmin(Request $request, $id)
    {
        // dd($request->all());
        $update = Keluar::find($id);
        $update->status = $request->status;
        $update->save();

        return redirect()->route('keluar.index');
    }

    public function viewdatakeluar()
    {
        $data = Keluar::all();
        return view('keluar.viewdatakeluar', compact('data'));
    }

    public function viewdatakeluarlurah()
    {
        $data = Keluar::all();
        return view('lurah.viewdatakeluar', compact('data'));
    }

    public function viewdatakeluarkasie()
    {
        $data = Keluar::all();
        return view('kasie.viewdatakeluar', compact('data'));
    }

    public function viewkasie($id)
    {
        $get = Keluar::find($id);

        return view('kasie.view',compact('get'));
    }

}
