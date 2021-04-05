<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imports\ShippersImport;
//use App\Exports\TransactionsExport;
//use App\Models\Shippers;


class ExcelController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('excel.index');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcel($type)
    {
        return \Excel::download(new TransactionsExport, 'transactions.'.$type);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExcel(Request $request)
    {

        //TODO: validation on each row?
        $request->validate([
            'import_file' => 'required|max:10000|mimes:csv,txt',
        ]);

        \Excel::import(new ShippersImport,$request->import_file);

        \Session::put('success', 'Your file is imported successfully in database.');

        return back();
    }
}
