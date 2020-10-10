<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = DB::table('sub_items')
                    ->leftJoin('menu_items', 'sub_items.sub_group', '=', 'menu_items.group_id')
                    ->get();
        $menulist = DB::table('menu_items')
                    ->get();
        return view('backend.report', ['response' => $response],['menulist' => $menulist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('sub_items')->insert(
            [
                'sub_name' => $request->get('sub_name'),
                'sub_src' => $request->get('sub_src'),
                'sub_group' => $request->get('sub_group'),
                // 'sub_order' => $request->get('sub_order'),
                'sub_active' => $request->get('sub_active'),
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
