<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Exception;


class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penduduk::all();
        if($data){
            return ApiFormatter::createAPI(200,'Success',$data);
        }else{
            return ApiFormatter::createAPI(400,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $penduduk = Penduduk::create($request->all());
            
            $data = Penduduk::where('nik', '=', $penduduk->nik)->get();
            if($data){
                return ApiFormatter::createAPI(200,'Success',$data);
            }else{
                return ApiFormatter::createAPI(400,'Failed');
            }
    
        }catch(Exception $error){
            return ApiFormatter::createAPI(400,'Failed',$error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        try{
            $penduduk = Penduduk::where('nik','=',$nik)->first();
            if($penduduk){
                return ApiFormatter::createAPI(200,'Success',$penduduk);
            }else{
                return ApiFormatter::createAPI(400,'Failed');
            }
        }catch(Exception $error ){
            return ApiFormatter::createAPI(400,'Failed',$error);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        try {

            $penduduk = Penduduk::findOrFail($nik);
            $penduduk->update([
                'nik' =>$request->nik,
                'nama' =>$request->nama,
                'tmplahir' =>$request->tmplahir,
                'tgllahir' =>$request->tgllahir,
                'jeniskel' =>$request->jeniskel,
                'darah' =>$request->darah,
                'alamat' =>$request->alamat,
                'rt' =>$request->rt,
                'rw' =>$request->rw,
                'desa' =>$request->desa,
                'camat' =>$request->camat,
                'propinsi' =>$request->propinsi,
                'agama'=>$request->agama,
                'stanikah' =>$request->stanikah,
                'pekerjaan' =>$request->pekerjaan,
                'wrgnegara' =>$request->wrgnegara,
                'tglBerlaku'=>$request->tglBerlaku
            ]);

            $data = Penduduk::where('nik', '=', $penduduk->nik)->get();

            if ($data) {
                return ApiFormatter::createAPI(200, 'Success', $data);
            } else {
                return ApiFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createAPI(400, 'Failed',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        try {
            $penduduk = Penduduk::findOrFail($nik);

            $data = $penduduk->delete();
            if ($data) {
                return ApiFormatter::createAPI(200, 'Success Destory data');
            } else {
                return ApiFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createAPI(400, 'Failed',$error);
        }
    }
}
