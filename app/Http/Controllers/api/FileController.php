<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\File;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        return File::all();
    }
    public function store(FileRequest $request)
    {
        if ($request->hasFile('file')) {


            $file = $request->file('file');

            $file_name_original = $file->getClientOriginalName();
            $file_name_original = pathinfo($file_name_original, PATHINFO_FILENAME);
            $file_name_formatted = str_replace(" ", "-", $file_name_original);

            $file_extension = $file->getClientOriginalExtension();
            $file_name = date('YmdHis') . '-' . $file_name_formatted . '.' . $file_extension;


            Storage::putFileAs('public', $file, $file_name);

            $files = new File();
            $files->filename = $file_name;
            $files->extension = $file_extension;
            $files->url = env('APP_URL') . '/storage/' . $file_name;
            $files->save();

            return response()->json([
                'res' => true,
                'msj' => 'éxito'
            ]);
        }
    }

    public function destroy(File $file)
    {

        $file->delete();

        return response()->json([
            'res' => true,
            'msj' => 'se borro lógicamente',
        ]);
    }


    public function forceDelete(File $file)
    {

        Storage::disk('public')->delete($file->filename);

        $file->forceDelete();

        return response()->json([
            'res' => true,
            'msj' => 'se borro fisicamente',
        ]);
    }
}
