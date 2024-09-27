<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function getPrivateFile(Request $request, $path)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }
        $filePath = storage_path('app/private/' . $path);
        if (!file_exists($filePath)) {
            abort(404);
        }
        return response()->file($filePath);
    }
}
