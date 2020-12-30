<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaySlipRequest;
use App\Models\Employee;
use App\Models\PaySlip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PaySlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payslips = PaySlip::with('employee')->latest()->paginate();
        return view('payslips.index', compact('payslips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::orderBy('nama', 'asc')->get();
        return view('payslips.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaySlipRequest $request)
    {
        $validedData = $request->validated();
        if ($validedData) {
            PaySlip::create($request->all());
            return redirect()->route('payslips.index')
                    ->with('success', 'Pay slip created successfully');
        }
        return redirect()->route('payslips.index')
                ->with('error', 'Error create pay slip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function show(PaySlip $paySlip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function edit(PaySlip $paySlip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaySlip $paySlip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaySlip  $paySlip
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaySlip $paySlip)
    {
        //
    }

    public function broadcast(Request $request)
    {
        $id_payslips = [];
        if ($request->session()->has('payslip')) {
            $id_payslips = $request->session()->get('payslip');
        }

        if (empty($id_payslips)) {
            return redirect()->back();
        }

        $payslips = PaySlip::whereIn('id', $id_payslips)
                    ->with('employee')->latest()->get();
        return view('payslips.broadcast', compact('payslips'));
    }

    public function send(Request $request)
    {
        $id_payslips = [];
        if ($request->session()->has('payslip')) {
            $id_payslips = $request->session()->get('payslip');
        }
        $data['payslips'] = $id_payslips;
        $data['subject'] = "Gajian bulan " . date('F') . " tahun " . date('Y');

        $job = (new \App\Jobs\SendBulkEmail($data))
                ->delay(
                    now()
                    ->addSecond(2)
                );
        dispatch($job);

        return response()->json(['success' => true], 200);
    }

    public function setSession(Request $request)
    {
        $request->session()->forget('payslip');
        $payslip_id = $request->input('payslip_id');
        $data = [];
        foreach ($payslip_id as $id) {
            if ($id != "on") {
                $request->session()->push('payslip', $id);
                $data[] = $id;
            }
        }

        return $data;
    }
}
