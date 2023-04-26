<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Camat;
use Exception;

class CamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Camat::
        select('propinsi.*','camat.kdPropinsi','camat.kdWilayah','camat.kdCamat','camat.nmCamat','wilayah.kdWilayah','wilayah.nmWilayah')
        ->leftjoin('propinsi','propinsi.kdPropinsi','=','camat.kdPropinsi')
        ->leftjoin('wilayah','wilayah.kdPropinsi','=','propinsi.kdPropinsi')
        ->get();
        // $data = Camat::all();

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
                'kdCamat' => 'required',
                'nmCamat' => 'required'
            ]);

            $camat = Camat::create([
                'kdPropinsi' => $request->kdPropinsi,
                'kdWilayah' => $request->kdWilayah,
                'kdCamat' => $request->kdCamat,
                'nmCamat' => $request->nmCamat
            ]);

            $data = Camat::where('kdCamat', '=', $camat->kdCamat)->get();

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
    public function show($kdCamat)
    {
        try{
            $data = Camat::
            select('propinsi.*','camat.kdPropinsi','camat.kdWilayah','camat.kdCamat','camat.nmCamat','wilayah.kdWilayah','wilayah.nmWilayah')
            ->leftjoin('propinsi','propinsi.kdPropinsi','=','camat.kdPropinsi')
            ->leftjoin('wilayah','wilayah.kdPropinsi','=','propinsi.kdPropinsi')
            ->where('kdCamat','=',$kdCamat)
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
    public function update(Request $request, $kdCamat)
    {
        try {
            $request->validate([
                'kdPropinsi' => 'required',
                'kdWilayah' => 'required',
                'kdCamat' => 'required',
                'nmCamat' => 'required'
            ]);

            $camat = Camat::findOrFail($kdCamat);

            $camat->update([
                'kdPropinsi' => $request->kdPropinsi,
                'kdWilayah' => $request->kdWilayah,
                'kdCamat' => $request->kdCamat,
                'nmCamat' => $request->nmCamat
            ]);

            $data = Camat::where('kdCamat', '=', $camat->kdCamat)->get();

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
    public function destroy($kdCamat)
    {
        try {
            $camat = Camat::findOrFail($kdCamat);

            $data = $camat->delete();
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
