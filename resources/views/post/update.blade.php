<x-app-layout>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @endif

                    <form class="w-full max-w-lg" action="{{ route('post.update',$post->slug) }}" method="POST" enctype="multipart/form-data" id="form">

                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                                    Título do Post
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" placeholder="titulo" name="title" value="{{old('title') ?? $post->title }}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subtitle">
                                    Subtítulo
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="subtitle" type="text" placeholder="subtitulo" name="subtitle" value="{{old('subtitle') ?? $post->subtitle}}">
                                <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="slug">
                                    Slug
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="slug" type="text" placeholder="nome-com-hífens" name="slug" value="{{old('slug')?? $post->slug}}">
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full  px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qnt_invited">
                                    Conteúdo
                                </label>
                                <textarea name="content" id="content" cols="30" rows="5" placeholder="Escreva aqui...">{{old('content') ?? $post->content}}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                        </div>
                        {{-- <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="thumbnail">
                                    Thumbnail
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="thumbnail" type="file" placeholder="nome-com-hífens" name="thumbnail" value="{{old('thumbnail')}}">
                            </div>
                        </div> --}}

                        <button type="submit" class="bg-amber-300 hover:bg-amber-500 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Postar
                        </button>
                    </form>

                    <form action="{{ route('post.change_thumbnail', ['post'=>$post->slug]) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="photo" class="block font-medium text-sm text-gray-700">
                                Foto Atual
                            </label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/thumbnails'. $post->thumbnail->file_path) }}" alt="">
                            </div>
                            <input type="file" id="photo" name="thumbnail" accept="image/*" 
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                                file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 rounded">
                            Alterar Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.querySelector("#form")
        form.addEventListener('submit', async function(e) {
            // e.preventDefault()
            
        })
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-app-layout>