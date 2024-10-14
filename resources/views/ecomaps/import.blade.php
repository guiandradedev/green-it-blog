<x-guest-layout>
    <section class="w-full max-w-md mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Importar Pontos de Coleta</h2>
        <form action="/admin/import-collection-points" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file_input" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecione o Arquivo</label>
                <input
                    type="file"
                    name="file"
                    id="file_input"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help"
                    accept=".csv,.xlsx"
                    required
                >
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400" id="file_input_help">Somente arquivos CSV ou XLSX são aceitos.</p>
                @error('file')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> <!-- Mostra erro se houver -->
                @enderror
            </div>

            <div class="flex justify-center">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition ease-in-out duration-300"
                >
                    Importar
                </button>
            </div>
        </form>
    </section>
</x-guest-layout>
