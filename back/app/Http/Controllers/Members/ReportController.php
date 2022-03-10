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

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = storage_path('app/public/reports/');
        $files = File::allFiles($path);
        foreach(File::allFiles($path) as $file) {
            echo $file->getExtension();
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
        return back()->with('success','Your report has been addred !');
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
        Excel::import(new FilesImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new FilesExport, 'users-collection.xlsx');
    }
}
