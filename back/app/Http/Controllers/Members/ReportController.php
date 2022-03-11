<?php

namespace App\Http\Controllers\Members;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Imports\FilesImport;
use App\Imports\ReportsImport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use mikehaertl\wkhtmlto\Pdf;
use Excel;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = storage_path('app/public/');
        $files = [];
        foreach(File::allFiles($path) as $file) {
            if($file->getExtension() == 'pdf') {
                array_push($files, $file);
            }
        }
        return view('members.report', compact('files'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importReport(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $request->file->store('public');
        return back()->with('success','Your report has been added !');
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function generate(Request $request)
    {
        $data = [
            'company_name' => Auth::user()->company->c_name,
            'company_email' => Auth::user()->company->c_email,
            'company_telephone' => Auth::user()->company->c_telephone,
            'company_address' => Auth::user()->company->c_no_street.", ".Auth::user()->company->c_streetname,
            'company_postalcode' => Auth::user()->company->c_postalcode,
            'company_city' => Auth::user()->company->c_city,
            'title_1' => $request->title1,
            'graph_1' => $request->graph1,
            'desc_1' => $request->comment1,
            'title_2' => $request->title2,
            'graph_2' => $request->graph2,
            'desc_2' => $request->comment2,
            'title_3' => $request->title3,
            'graph_3' => $request->graph3,
            'desc_3' => $request->comment3,
            'title_4' => $request->title4,
            'graph_4' => $request->graph4,
            'date' => Carbon::now()->format('d-m-Y')
        ];

        $render = view('graph')->render();
   
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));
    
        return response()->download(public_path('report.pdf'));

        //$pdf = PDF::loadView('template', $data);
        //return $pdf->download('prout.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new FilesImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new FilesExport, 'report-infos.xlsx');
    }
}
