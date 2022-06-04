<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;

class PaymentController extends Controller
{
    public function index()
    {
        return view('school.payment.index');
    }

    public function register(Request $request)
    {
        $request->validate(['amount'=>'required|integer']);

        $admission = Admission::find($request->admissionId);
        $admission->payments()->create(['amount'=>$request->amount]);

        return redirect()->route('school.payment.index');
    }
}
