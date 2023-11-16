<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Defuse\Crypto\Exception\IOException;
use Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException;
use Defuse\Crypto\File;

class DecryptController extends Controller
{
    public function decrypt(Request $request)
    {
        // Obtiene la contraseña y el archivo cifrado desde la solicitud
        $password = $request->input('password');
        $uploadedCryptedFile = $request->file('archivo_cifrado');

        // Valida si se ha subido un archivo cifrado
        if ($uploadedCryptedFile) {
            $originalFileName = $uploadedCryptedFile->getClientOriginalName();
            $extensionCifrado = $uploadedCryptedFile->getClientOriginalExtension();

            // Ruta donde se almacenará el archivo descifrado
            $outputFilePath = storage_path('app/archivos/' . pathinfo($originalFileName, PATHINFO_FILENAME));

            try {
                File::decryptFileWithPassword($uploadedCryptedFile->getRealPath(), $outputFilePath, $password);

                // Devuelve el archivo descifrado como descarga
                return response()->download($outputFilePath)->deleteFileAfterSend(true);
            } catch (IOException $e) {
                return 'Error leyendo o escribiendo el archivo cifrado. Verifica que el archivo cifrado exista y que tengas permiso de escritura';
            } catch (EnvironmentIsBrokenException $e) {
                return 'El entorno está roto. Normalmente es porque la plataforma actual no puede descifrar el archivo de una manera segura';
            } catch (WrongKeyOrModifiedCiphertextException $e) {
                return 'La clave es errónea o alguien la intentó modificar, cuidado';
            }
        }

        return 'No se ha subido ningún archivo cifrado.';
    }
}
