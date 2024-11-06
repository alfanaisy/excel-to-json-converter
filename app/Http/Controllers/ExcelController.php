<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Only allow Excel files
        ]);

        $file = $request->file('file');

        $data = Excel::toArray(new ExcelImport, $file)[0];
        
        $headers = array_shift($data);
        $rows = $data;
        
        // Initialize an array to store the final results
        $jsonObjects = [];

        // Loop through each row and create an object
        foreach ($rows as $row) {
            // Combine the header and the row values into an associative array
            $jsonObject = array_combine($headers, $row);
            
            // Add the associative array to the final array of objects
            $jsonObjects[] = $jsonObject;
        }     
        return response()->json($jsonObjects);
    }
}
