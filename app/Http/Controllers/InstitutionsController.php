<?php

namespace App\Http\Controllers;

use App\Institutions;
use Illuminate\Http\Validator;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institutions::all();
        return response()->json($institutions);
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
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        if ($validate->passes()) {

            $institutions = Institutions::create($request->all());
            return response()-> json([
                'message' => 'Data berhasil di simpan',
                'data' => $institutions
            ]);
        }
        return response()->json([
            'message' => 'Data gagal di simpan',
            'data' => $validate->error()->all()
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function show(Institutions $institutions)
    {
        $data = Institutions::where('id', $institutions)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'Data Tidak di Temukan'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function edit(Institutions $institutions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */

     //disini bagian dari ngambil dari apinya
    public function update(Request $request, $institutions)
    {

        $data = Institutions::where('id', $institutions)->first();
        if (!empty($data)) {
            $validate = Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required'
            ]);
        }

        if ($validate->passes()) {
            $data->update($request->all());
            return response()->json([
                'message' => 'Data Berhasil di simpan',
                'data' => $data
            ], 200);
        }else {
                return response()->json([
                'message' => 'Data gagal di simpan',
                'data' => $validate->error()->all()
                ]);
        }
        return response()->json([
            'message' => 'Data Gagal di simpan',
            'data' => $validate->errors()->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institutions  $institutions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institutions $institutions)
    {
        $data = Institutions::where('id', $institutions)->first();
        if (!empty($data)) {
            return response()->json([
                'message' => 'Data tidak di temukan'
            ], 404);
        }
        $data->delete();
        return response()->json([
            'message' => 'Data berhasil di hapus'
        ], 200);
    }
}
