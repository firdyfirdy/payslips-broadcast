<?php

namespace App\Jobs;

use App\Models\MailBroadcast;
use App\Models\PaySlip;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendBulkEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    public $timeout = 7200;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $input['subject'] = $this->data['subject'];
        $payslips = PaySlip::whereIn('id', $this->data['payslips'])->with('employee')->get();

        foreach ($payslips as $key => $payslip) {

            $input['email'] = $payslip->employee->email;
            $input['nama'] = $payslip->employee->nama;
            $input['gaji_bersih'] = $payslip->gaji_bersih;
            $input['gaji_pokok'] = $payslip->gaji_pokok;
            $input['total_lembur'] = $payslip->total_lembur;
            $input['potongan'] = $payslip->potongan;
            $input['nik'] = $payslip->employee->nik;
            $input['departemen'] = $payslip->employee->departemen;
            $input['jabatan'] = $payslip->employee->jabatan;

            try {

                // Sent Email
                Mail::send(['html' => 'emails.slip'], $input, function ($message) use($input) {
                    $message->from(config('mail.from.address'), config('mail.from.name'));
                    $message->to($input['email'], $input['nama']);
                    $message->subject($input['subject']);
                });

                // Change Status is_broadcast
                PaySlip::where('id', $payslip->id)->update(['is_broadcast' => 1]);

                // Forget session
                Session::forget('payslip');

                // Store to database 
                MailBroadcast::create([
                    'employee_id' => $payslip->employee->id,
                    'email' => $payslip->employee->email,
                    'status' => 1
                ]);
            } catch (\Exception $e) {

                // Store to database 
                MailBroadcast::create([
                    'employee_id' => $payslip->employee->id,
                    'email' => $payslip->employee->email,
                    'status' => 0
                ]);
            }
        }
    }
}
