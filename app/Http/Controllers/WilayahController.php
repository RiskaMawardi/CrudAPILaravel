<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Propinsi;
use App\Models\Wilayah;
use Exception;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Wilayah::select('propinsi.*','wilayah.kdWilayah','wilayah.nmWilayah')
        ->leftjoin('propinsi','propinsi.kdPropinsi','=','wilayah.kdPropinsi')
        ->get();

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
            $request->validate([
                'kdPropinsi' => 'required',
                'kdWilayah' => 'required',
                'nmWilayah' => 'required'
            ]);

            $wilayah = Wilayah::create([
                'kdPropinsi' => $request->kdPropinsi,
                'kdWilayah' => $request->kdWilayah,
                'nmWilayah' => $request->nmWilayah
            ]);

            $data = Wilayah::where('kdWilayah', '=', $wilayah->kdWilayah)->get();

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
    public function show($kdWilayah)
    {
        try{
            $data = Wilayah::leftjoin('propinsi','propinsi.kdPropinsi','=','wilayah.kdPropinsi')
            ->select('wilayah.*','propinsi.kdPropinsi','propinsi.nmPropinsi')
            ->where('kdWilayah','=',$kdWilayah)
            ->get();
        
            if($data){
                return ApiFormatter::createAPI(200,'Success',$data);
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
    public function update(Request $request, $kdWilayah)
    {
        try {
            $request->validate([
                'kdPropinsi' => 'required',
                'kdWilayah' => 'required',
                'nmWilayah' => 'required'
            ]);

            $wilayah = Wilayah::findOrFail($kdWilayah);

            $wilayah->update([
                'kdPropinsi' => $request->kdPropinsi,
                'kdWilayah' => $request->kdWilayah,
                'nmWilayah' => $request->nmWilayah
            ]);

            $data = Wilayah::where('kdWilayah', '=', $wilayah->kdWilayah)->get();

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
    public function destroy($kdWilayah)
    {
        try {
            $wilayah = Wilayah::findOrFail($kdWilayah);

            $data = $wilayah->delete();
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
