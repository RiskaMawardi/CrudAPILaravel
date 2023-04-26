<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Propinsi;
use Exception;
use Illuminate\Http\Request;

class PropinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Propinsi::all();
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
                'nmPropinsi' => 'required',
            ]);

            $prop = Propinsi::create([
                'kdPropinsi' => $request->kdPropinsi,
                'nmPropinsi' => $request->nmPropinsi
            ]);

            $data = Propinsi::where('kdPropinsi', '=', $prop->kdPropinsi)->get();
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
    public function show($kdPropinsi)
    {
        try{
            $prop = Propinsi::where('kdPropinsi','=',$kdPropinsi)->first();
            if($prop){
                return ApiFormatter::createAPI(200,'Success',$prop);
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
    public function update(Request $request, $kdPropinsi)
    {
        try {
            $request->validate([
                'kdPropinsi' => 'required',
                'nmPropinsi' => 'required',
            ]);


            $prop = Propinsi::findOrFail($kdPropinsi);

            $prop->update([
                'kdPropinsi' => $request->kdPropinsi,
                'nmPropinsi' => $request->nmPropinsi
            ]);

            $data = Propinsi::where('kdPropinsi', '=', $prop->kdPropinsi)->get();

            if ($data) {
                return ApiFormatter::createAPI(200, 'Success', $data);
            } else {
                return ApiFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createAPI(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kdPropinsi)
    {
        try {
            $prop = Propinsi::findOrFail($kdPropinsi);

            $data = $prop->delete();

            if ($data) {
                return ApiFormatter::createAPI(200, 'Success Destory data');
            } else {
                return ApiFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createAPI(400, 'Failed');
        }
    }
}
