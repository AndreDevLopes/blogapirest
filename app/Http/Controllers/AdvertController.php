<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\User;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();
        if($adverts):
            return response()->json(['error'=>false,'status'=>200,'data'=>$adverts]);
        else:
            return response()->json(['error'=>true,'status'=>400,'messege'=>'nao possui anuncios']);
        endif;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'title',
            'description'
        ]);

        $user = User::find($id);

        if($user):
            $data = $request->all();
            $data['user_id'] = intval($id);

            $advert = Advert::create($data);

            if($advert):
                return response()->json(['error'=>false,'status'=>200,'data'=>$advert]);
            else:
                return response()->json(['error'=>true,'status'=>400,'messege'=>'falha no cadastro']);
            endif;
        else:
            return response()->json(['error'=>true,'status'=>400,'messege'=>'usuario nao encontrado']);
        endif;

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
    }
}
