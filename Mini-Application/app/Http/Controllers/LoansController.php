<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Loan;
use Carbon\Carbon;
class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Response(Loan::all());
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
        //
        // $loan = new Loan();
        // $loan->amount = intval($request->amount);
        // $loan->term = intval($request->term);
        // $loan->interest_rate = floatval($request->interest_rate);
        // $loan->select_mounth = intval($request->select_mounth);
        // $loan->select_year = intval($request->select_year);
        // $loan->action_by = $request->select_year;
        // $loan->save();
        $id = DB::table('loans')->insertGetId(
            ['amount' => intval($request->amount)
            , 'term' => intval($request->term)
            , 'interest_rate' => floatval($request->interest_rate)
            , 'select_mounth' => intval($request->select_mounth)+1
            , 'select_year' => intval($request->select_year)
            , 'action_by' => $request->action_by
            , 'created_at' => $request->created_at
             ]
        );
        return Response($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $detail = DB::table('loans')->where('id', '=', $request->id)->get();
//$data_detail = DB::table('loans')->where('id', $request->$id)->first();
        //$data_detail = DB::table('loans')->select('id', 'amount', 'term')->get();
  return Response($detail );

    // return View('index', array(
    //     'data_detail' =>  $data_detail,
    // ));
        //  return view("/detail")->with([
        //     'id'=> $id
        // ]);
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
    public function update(Request $request, $id)
    {
        //
        return Company::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        $res = DB::table('loans')->where('id', '=', $request->id)->delete();
        return $res;
        //$data = DB::find ( $request->id )->delete ();
    }
}
