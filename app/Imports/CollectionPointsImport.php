<?php
namespace App\Imports;

use App\Models\CollectionPoint;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CollectionPointsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    // Define o tamanho do chunk de leitura para evitar consumo excessivo de memória
    public function chunkSize(): int
    {
        return 1000; // Ajuste conforme necessário
    }

    public function model(array $row)
    {
        try {
            // Verificação se os campos obrigatórios estão presentes
            if (empty($row['nome']) || empty($row['cidade']) || empty($row['estado']) ||
                empty($row['endereco']) || empty($row['cep']) || empty($row['latitude']) || 
                empty($row['longitude']) || empty($row['abertura']) || empty($row['fechamento'])) {
                return null; // Ignora a linha se faltar algum dado necessário
            }

            // Conversão de horários para formato TIME
            $openingHours = Carbon::createFromTimeString(gmdate('H:i:s', $row['abertura'] * 86400));
            $closingHours = Carbon::createFromTimeString(gmdate('H:i:s', $row['fechamento'] * 86400));

            // Verificação se há horário de almoço
            $hasLunch = strtolower(trim($row['almoco'])) === "sim" ? true : false;

            // Verificar se já existe um ponto de coleta com as mesmas coordenadas
            $existingPoint = CollectionPoint::where('latitude', $row['latitude'])
                ->where('longitude', $row['longitude'])
                ->first();

            if ($existingPoint) {
                // Registro já existe, ignorar ou atualizar conforme sua necessidade
                return null; // Ignora a linha se o registro já existir
                // Se quiser atualizar, você pode fazer algo como:
                // $existingPoint->update([
                //     'name' => $row['nome'],
                //     'city' => $row['cidade'],
                //     'state' => $row['estado'],
                //     'address' => $row['endereco'],
                //     'neighborhood' => $row['bairro'],
                //     'postal_code' => $row['cep'],
                //     'opening_hours' => $openingHours,
                //     'closing_hours' => $closingHours,
                //     'has_lunch' => $hasLunch,
                //     'description' => $row['descricao'],
                // ]);
            }

            return CollectionPoint::create([
                'name' => $row['nome'],                            // Nome
                'city' => $row['cidade'],                          // Cidade
                'state' => $row['estado'],                         // Estado
                'address' => $row['endereco'],                     // Endereço
                'neighborhood' => $row['bairro'],                  // Bairro
                'postal_code' => $row['cep'],                      // CEP
                'latitude' => $row['latitude'],                    // Latitude
                'longitude' => $row['longitude'],                  // Longitude
                'opening_hours' => $openingHours,                  // Abertura
                'closing_hours' => $closingHours,                  // Fechamento
                'has_lunch' => $hasLunch,                          // Almoço (Sim/Não)
                'description' => $row['descricao'],                // Descrição
            ]);

        } catch (\Exception $e) {
            // Log de erro ou apenas ignorar a linha
            return null; // Ignora a linha com erro
        }
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'endereco' => 'required|string',
            'bairro' => 'required|string',
            'cep' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'abertura' => 'required|string',
            'fechamento' => 'required|string',
            'almoco' => 'required|string|in:Sim,Nao',
            'descricao' => 'nullable|string',
        ];
    }
}
