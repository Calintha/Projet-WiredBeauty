<?php

namespace App\Http\Controllers\Members;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Imports\ReportsImport;
use Illuminate\Http\Request;
use PDF;
use Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.report');
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function generate()
    {
        $data = [
            'title' => 'Prout',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('template', $data);
        
        return $pdf->download('prout.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new ReportsImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ReportsExport, 'users-collection.xlsx');
    }
}
