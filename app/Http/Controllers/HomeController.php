<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncryptedFile;

class HomeController extends Controller
{
    public function index()
{
    $encryptedFiles = auth()->user()->encryptedFiles;
    return view('home', ['encryptedFiles' => $encryptedFiles]);
}





}
