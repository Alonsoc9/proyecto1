<?php

namespace App\Http\Controllers;

use App\Models\EncryptedFile;
use Illuminate\Http\Request;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Defuse\Crypto\Exception\IOException;
use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;
use Defuse\Crypto\File;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use Symfony\Component\HttpFoundation\StreamedResponse;



class EncryptController extends Controller
{
    public function encrypt(Request $request)
    {
        // Obtén la contraseña y el archivo desde la solicitud
        $password = $request->input('password');
        $uploadedFile = $request->file('archivo');
    
        // Valida si se ha subido un archivo
        if ($uploadedFile) {
            $originalFileName = $uploadedFile->getClientOriginalName();
    
            // Ruta donde se almacenará el archivo cifrado
            $outputDirectory = 'archivos';
            $outputFilePath = $outputDirectory . '/' . $originalFileName . '.crypt';
    
            try {
                // Cifra el archivo
                File::encryptFileWithPassword($uploadedFile->getRealPath(), storage_path('app/' . $outputFilePath), $password);
    
                // Mueve el archivo cifrado a la ubicación deseada
                Storage::move($outputFilePath, $outputDirectory . '/' . $originalFileName . '.crypt');
    
                // Guarda la información en la tabla encrypted_files
                $encryptedFile = new EncryptedFile();
                $encryptedFile->filename = $originalFileName;
                $encryptedFile->path = $outputDirectory . '/' . $originalFileName . '.crypt';
                $encryptedFile->user_id = auth()->id(); // Obtén el ID del usuario actual
                $encryptedFile->save();
    
                // Agrega un mensaje de éxito a la sesión

// Redirecciona a la vista "encriptar"
return redirect()->route('encriptar')->with('success', 'El archivo se ha cifrado y guardado en la ruta deseada.');
            } catch (IOException $e) {
                return 'Error leyendo o escribiendo el archivo. Verifica que el archivo de entrada exista y que tengas permiso de escritura';
            } catch (EnvironmentIsBrokenException $e) {
                return 'El entorno está roto. Normalmente es porque la plataforma actual no puede encriptar el archivo de una manera segura';
            } catch (WrongKeyOrModifiedCiphertextException $e) {
                return 'La clave es errónea o alguien la intentó modificar, cuidado';
            }
        }
    
        return 'No se ha subido ningún archivo.';
    }

    //funcion para el historial
    public function historial()
{
    $userId = auth()->id(); // Obtén el ID del usuario actual
    $encryptedFiles = EncryptedFile::where('user_id', $userId)->get();

    return view('historial', compact('encryptedFiles'));
}


public function download($id)
{
    $file = EncryptedFile::find($id);

    if ($file) {
        // Obtiene la ruta completa del archivo cifrado
        $filePath = storage_path('app/' . $file->path);

        // Define el nombre de descarga con la extensión .crypt
        $downloadName = $file->filename . '.crypt';

        // Devuelve el archivo al navegador
        return response()->download($filePath, $downloadName, [
            'Content-Type' => 'application/octet-stream',
        ]);
    }

    return abort(404); // Devuelve un error 404 si el archivo no se encuentra
}








}