<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionPoint>
 */
class CollectionPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        // Lista de cidades de São Paulo
        $citiesInSaoPaulo = [
            'São Paulo', 'Campinas', 'Santos', 'Sorocaba', 'São José dos Campos',
            'Ribeirão Preto', 'Bauru', 'Piracicaba', 'Jundiaí', 'Barueri'
        ];

        // Faixa de CEP de SP (pode ajustar conforme necessidade)
        $cepSaoPaulo = $faker->numberBetween(01000, 19999) . '-' . $faker->numberBetween(100, 999);

        // Limites aproximados de latitude e longitude do estado de São Paulo
        $latitudeSaoPaulo = $faker->latitude(-24.73, -20.53);  // SP está entre essas latitudes
        $longitudeSaoPaulo = $faker->longitude(-54.00, -44.00); // SP está entre essas longitudes

        return [
            "name" => collect($faker->words(5))->join(' '), // Gera um nome de ponto de coleta
            "address" => $faker->streetAddress(),
            "city" => $faker->randomElement($citiesInSaoPaulo), // Seleciona uma cidade aleatória de SP
            "neighborhood" => $faker->randomElement($citiesInSaoPaulo), // Seleciona uma cidade aleatória de SP
            "state" => 'São Paulo', // Define o estado como São Paulo
            "postal_code" => $cepSaoPaulo, // Gera um CEP válido para São Paulo
            "latitude" => $latitudeSaoPaulo, // Limita a latitude ao estado de SP
            "longitude" => $longitudeSaoPaulo, // Limita a longitude ao estado de SP
            "description" => $faker->sentence(),
        ];

        // return [
        //     "name" => collect($faker->words(5))->join(' '), // Junta as palavras com espaço para um nome mais realista
        //     "address" => $faker->streetAddress(),
        //     "city" => $faker->city(),
        //     "state" => $faker->state(),
        //     "postal_code" => $faker->postcode(),
        //     "latitude" => $faker->latitude(-33.75, 5.26), // Limites aproximados do Brasil
        //     "longitude" => $faker->longitude(-73.99, -34.79), // Limites aproximados do Brasil
        //     "description" => $faker->sentence(),
        // ];
    }
}
