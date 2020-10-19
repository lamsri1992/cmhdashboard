<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = DB::table('table_queries')->get();
        return view('backend.table', ['response' => $response]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr_where = array();
        foreach($request->get('table_level') as $level){ 
            $arr_where[] = $level;
        }
        $levels = implode(",",$arr_where);

        DB::table('table_queries')->insert(
            [
                'table_name' => $request->get('table_name'),
                'table_query' => $request->get('table_query'),
                'table_html' => $request->get('table_html'),
                'table_level' => $levels,
                'table_active' => $request->get('table_active'),
            ]
        );
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
        $raws = DB::select(DB::raw($query));
        return view('backend.table_show', ['data' => $data],['raws' => $raws]);
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
        $arr_where = array();
        foreach($request->get('table_level') as $level){ 
            $arr_where[] = $level;
        }
        $levels = implode(",",$arr_where);

        DB::table('table_queries')->where('table_id', $id)->update(
            [
                'table_name' => $request->get('table_name'),
                'table_query' => $request->get('table_query'),
                'table_html' => $request->get('table_html'),
                'table_level' => $levels,
                'table_active' => $request->get('table_active'),
            ]
        );
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
