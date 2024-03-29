<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!isset(Auth::user()->id)){
            session(['link' => url()->previous()]);
            return view('auth.login');
        }else{
            $userID = Auth::user()->id;
            $hos = DB::table('sys_member')
                        ->leftJoin('sys_admin', 'sys_member.username', '=', 'sys_admin.username')
                        ->leftJoin('chospital', 'sys_member.officename', '=', 'chospital.hoscode')
                        ->where('sys_admin.id', $userID)
                        ->first();
            $hcode = $hos->officename;
            $aumpher = $hos->distcode;
            $data = DB::table('table_queries')
                    ->where('table_queries.table_id', $id)
                    ->first();
            $query = $data->table_query;
            $sql = str_replace('{hcode}',$hcode, $query);
            // $sql = str_replace('{aumpher}',$aumpher, $query);
            $raws = DB::select(DB::raw($sql));

            return view('report.show', ['data' => $data],['raws' => $raws]);
        }
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
