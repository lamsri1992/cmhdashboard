<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $data = DB::table('table_queries')
                ->where('table_queries.table_id', $id)
                ->first();
        $query = $data->table_query;
        // check $level = session->login.level
        // replace $hcode = session->login.hcode
        // replace $amphur = session->login.aumphur
        /**
         * Replace Request -> Session
         */
        $query = str_replace('{hcode}','23736', $query);
        $raws = DB::select(DB::raw($query));
        return view('report.show', ['data' => $data],['raws' => $raws]);
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
