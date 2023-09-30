<?php

namespace App\Http\Controllers;

use App\Imports\ProductsTestImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{

    public function showUploadForm()
    {
        return view('upload');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);
        try {
            DB::beginTransaction();

            $file = $request->file('excel_file');

            $productsImport = new ProductsTestImport();
            Excel::import($productsImport, $file);

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Excel file uploaded and data imported successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error importing data.');
        }
    }
}
