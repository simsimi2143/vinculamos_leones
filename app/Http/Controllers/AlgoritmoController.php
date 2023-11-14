<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Iniciativas;



class AlgoritmoController extends Controller
{
    public function ejecutarAlgoritmoDesdeDescripcion(Request $request)
    {
        // Obtén la descripción desde la solicitud
        $descripcion = Iniciativas::where('inic_codigo', 10)->select('inic_descripcion')->first();

        if (!$descripcion) {
            return response()->json(['error' => 'Descripción no encontrada']);
        }

        // Asegurarse de que la descripción está en formato UTF-8
        $descripcionUtf8 = mb_convert_encoding($descripcion->inic_descripcion, 'UTF-8', 'UTF-8');

        // Rutas a los archivos pkl
        $classifierOdsPath = storage_path('python_scripts/classifier_ods.pkl');
        $classifierMetasPath = storage_path('python_scripts/classifier_metas.pkl');
        $vectorizerPath = storage_path('python_scripts/vectorizer.pkl');
        $mlbOdsPath = storage_path('python_scripts/mlb_ods.pkl');
        $mlbMetasPath = storage_path('python_scripts/mlb_metas.pkl');

        // Comando para ejecutar el script de Python
        $command = "python3 " . base_path('tu_script.py') . " '{$descripcionUtf8}' '{$classifierOdsPath}' '{$classifierMetasPath}' '{$vectorizerPath}' '{$mlbOdsPath}' '{$mlbMetasPath}' 2>&1";

        // Ejecutar el script de Python
        exec($command, $output, $returnCode);

        // Verificar el código de retorno y manejar la salida como desees
        if ($returnCode !== 0) {
            // Manejar el error
            return response()->json(['error' => 'Error al ejecutar el script']);
        }

        return response()->json(['result' => $output]);
    }
}

