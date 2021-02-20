<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Sanpham::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newsanpham = new Sanpham;
        $newsanpham->ten = $request->ten;
        $newsanpham->tien = $request->gia;
        $newsanpham->mota = $request->mota;
        $newsanpham->hinh = $request->hinh;
        $newsanpham->save();

        return response()->json($newsanpham, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $find = Sanpham::find($id);
        if(!$find){
            return response()->json('Thông báo không có người dùng',404);
        }
        return $find;
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
        //
        $sanpham = Sanpham::find($id);
       // return response()->json($request, 200);
        if($sanpham){
            $sanpham->ten = $request->ten;
            $sanpham->tien= $request->tien;
            $sanpham->save();
            return response()->json([
                "message" => "thông báo thay đổi thành công"
            ], 200);
        }
        return response()->json([
                "message"=>"thông báo sai"
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $sanpham = Sanpham::find($id);
            $sanpham->delete();
            return response()->json(
                ["message" => "Thành công"],
                200
            );
        }catch(Exception $e){
            return response()->json(
                ["message" => $e],
                404
            );
        }

    }
}
