<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4">
                            @foreach ($errors->all() as $error)
                                <div class="text-red-500">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Formulário para alterar a foto -->
                    <form action="{{ route('profile.change_photo') }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="photo" class="block font-medium text-sm text-gray-700">
                                Foto Atual
                            </label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/avatars'. $user->avatar) }}" class="h-32 w-32">
                            </div>
                            <input type="file" id="photo" name="photo" accept="image/*" 
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                                file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 rounded">
                            Alterar Foto
                        </button>
                    </form>

                    <hr class="my-6">

                    <!-- Formulário para editar o perfil -->
                    <form action="{{ route('profile.edit') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">
                                Descrição
                            </label>
                            <textarea id="description" name="description" required 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $user->about }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="github" class="block font-medium text-sm text-gray-700">
                                GitHub
                            </label>
                            <input type="url" id="github" name="github" placeholder="https://github.com/usuario"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ $user->github }}">
                        </div>

                        <div class="mb-4">
                            <label for="linkedin" class="block font-medium text-sm text-gray-700">
                                LinkedIn
                            </label>
                            <input type="url" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/usuario"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                value="{{ $user->linkedin }}">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-500 rounded">
                            Editar Perfil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>