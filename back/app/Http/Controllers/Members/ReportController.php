<?php

namespace App\Http\Controllers\Members;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Imports\FilesImport;
use App\Imports\ReportsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;
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
        $request->file->store('public');
        return back()->with('success','Your report has been added !');
    }

    /**
    * @return \Illuminate\Http\Response
    */
    public function generate(Request $request)
    {
        $request->validate([
            'title1' => 'min:2|max:65',
            'comment1' => 'min:5|max:255',
            'title2' => 'min:2|max:65',
            'comment2' => 'min:5|max:255',
            'title3' => 'min:2|max:65',
            'comment3' => 'min:5|max:255',
            'title4' => 'min:2|max:65',
        ]);

        $data = [
            'company_name' => Auth::user()->company->c_name,
            'company_email' => Auth::user()->company->c_email,
            'company_telephone' => Auth::user()->company->c_telephone,
            'company_address' => Auth::user()->company->c_no_street.", ".Auth::user()->company->c_streetname,
            'company_postalcode' => Auth::user()->company->c_postalcode,
            'company_city' => Auth::user()->company->c_city,
            'title1' => $request->title1,
            'graph1' => $request->graph1,
            'comment1' => $request->comment1,
            'title2' => $request->title2,
            'graph2' => $request->graph2,
            'comment2' => $request->comment2,
            'title3' => $request->title3,
            'graph3' => $request->graph3,
            'comment3' => $request->comment3,
            'title4' => $request->title4,
            'graph4' => $request->graph4,
        ];

        $pdf = PDF::loadView('template', $data);
        
        return $pdf->download('prout.pdf');
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
