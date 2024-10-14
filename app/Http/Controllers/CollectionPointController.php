<?php

namespace App\Http\Controllers;

use App\Imports\CollectionPointsImport;
use App\Models\CollectionPoint;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class CollectionPointController extends Controller
{
    public function __construct(
        protected CollectionPoint $collection
    ) {}
    
    public function index() {
        return view('ecomaps.index');
    }

    public function list_ecomaps() {
        $points = $this->collection->all();
        return response()->json($points);
    }

    public function import(Request $request) 
    {
        $this->authorize('import', [CollectionPoint::class]);
        
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx', // Validação do arquivo
        ]);

        try {
            // Tenta carregar o arquivo e verificar a estrutura
            Excel::import(new CollectionPointsImport, $request->file('file'));
            return redirect()->back()->with('success', 'Pontos de coleta importados com sucesso!');
        } catch (ValidationException $e) {
            // Captura exceções de validação
            $failures = $e->failures();
            return redirect()->back()->withErrors(['file' => 'Erro ao importar: ' . $failures[0]->errors()[0]]);
        } catch (\Exception $e) {
            // Captura outras exceções
            return redirect()->back()->withErrors(['file' => 'Erro ao importar: ' . $e->getMessage()]);
        }
    }

    public function import_page() {
        $this->authorize('import', [CollectionPoint::class]);

        return view('ecomaps.import');
    }
    
}
