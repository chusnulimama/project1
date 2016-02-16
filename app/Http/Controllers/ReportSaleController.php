<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('d - m - Y');
        $start = request()->input('from', Carbon::now()->format('d-m-Y'));
        $until = request()->input('until', Carbon::now()->format('d-m-Y'));

        $report = TransactionDetail::whereHas('master', function($subQuery) use($start, $until){
            $subQuery->where('type', 'Sale');
            $subQuery->where('date_trans', '>=', Carbon::createFromFormat('d-m-Y', $start)->format('Y-m-d'));
            $subQuery->where('date_trans', '<=', Carbon::createFromFormat('d-m-Y', $until)->format('Y-m-d'));
            $subQuery->groupBy('date_trans');
        })->get();

        $data = [
            'from'      => $start,
            'until'     => $until,
            'report'    => $report,
            'today'     => $today
        ];

        return view('layouts/report/table/sale_report', $data);
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
