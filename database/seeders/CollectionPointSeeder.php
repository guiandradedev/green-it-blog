<?php

namespace Database\Seeders;

use App\Imports\CollectionPointsImport;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CollectionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Tenta carregar o arquivo e verificar a estrutura
            $filePath = database_path('seeders/Lista de ecopontos.xlsx');

            // Tenta carregar o arquivo e verificar a estrutura
            Excel::import(new CollectionPointsImport, $filePath);

            // Mensagem de sucesso se a importação for bem-sucedida
            echo 'Pontos de coleta importados com sucesso!';
        } catch (ValidationException $e) {
            // Captura exceções de validação
            
        }
    }
}
