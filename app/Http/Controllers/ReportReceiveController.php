<?php

namespace App\Http\Controllers;

use App\Jobs\Report\CreateReport;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = request()->input('from', Carbon::now()->format('d-m-Y'));
        $until = request()->input('until', Carbon::now()->format('d-m-Y'));

        $report = TransactionDetail::whereHas('master', function($subQuery) use($start, $until) {
            $subQuery->where('type', 'Receive');
            $subQuery->where('date_trans', '>=', Carbon::createFromFormat('d-m-Y', $start)->format('Y-m-d'));
            $subQuery->where('date_trans', '<=', Carbon::createFromFormat('d-m-Y', $until)->format('Y-m-d'));
            $subQuery->groupBy('date_trans');
        })->get();

        $data = [
            'from' => $start,
            'until'=> $until,
            'report' => $report
        ];

        return view('layouts/report/table/receipt_report', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $this->dispatch(new CreateReport($request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('reportReceive');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $report)
    {
        return view('layouts/report/table/receipt_report')->with('report', $report);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
