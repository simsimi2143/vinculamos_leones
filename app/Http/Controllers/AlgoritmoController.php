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
use Symfony\Component\Process\Process;



class AlgoritmoController extends Controller
{
    public function ejecutarAlgoritmoDesdeDescripcion(Request $request)
    {
        // Obtén la descripción desde la solicitud
        $descripcion = Iniciativas::where('inic_codigo', 10)->select('inic_descripcion')->get();
        // return $descripcion[0]->inic_descripcion;
        if (!$descripcion) {
            return response()->json(['error' => 'Descripción no encontrada']);
        }

        // Asegurarse de que la descripción está en formato UTF-8
        $descripcionUtf8 = mb_convert_encoding($descripcion[0]->inic_descripcion, 'UTF-8', 'UTF-8');

        // Rutas a los archivos pkl
        $classifierOdsPath = storage_path('python_scripts/classifier_ods.pkl');
        $classifierMetasPath = storage_path('python_scripts/classifier_metas.pkl');
        $vectorizerPath = storage_path('python_scripts/vectorizer.pkl');
        $mlbOdsPath = storage_path('python_scripts/mlb_ods.pkl');
        $mlbMetasPath = storage_path('python_scripts/mlb_metas.pkl');

        $algoritmo = new Process(['python', 'public/js/python_scripts/script.py', $descripcionUtf8]);

        $algoritmo->run();
        $resAlgoritmo = $algoritmo->getOutput();

        return response()->json(['result' => $resAlgoritmo]);
    }
}

