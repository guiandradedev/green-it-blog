<x-app-layout>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @endif

                    <form class="w-full max-w-lg" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="form">

                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                                    Título do Post
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" placeholder="titulo" name="title" value="{{old('title')}}">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subtitle">
                                    Subtítulo
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="subtitle" type="text" placeholder="subtitulo" name="subtitle" value="{{old('subtitle')}}">
                                <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="slug">
                                    Palavra-Chave
                                </label>
                                <input required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="slug" type="text" placeholder="nome-com-hífens" name="slug" value="{{old('slug')}}">
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full  px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="qnt_invited">
                                    Conteúdo
                                </label>
                                <textarea name="content" id="content" cols="30" rows="5" placeholder="Escreva aqui...">{{old('content')}}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="thumbnail">
                                    Thumbnail
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="thumbnail" type="file" placeholder="nome-com-hífens" name="thumbnail" value="{{old('thumbnail')}}" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div>
                            <h2 class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                Referencias
                            </h2>
                            <div class="w-full px-3 mb-6 md:mb-0 references" id="reference-base">
                                <div>
                                    <div>
                                        <label for="reference-accessed_at-0">Link</label>
                                        <input type="text" name="reference-link-0" id="reference-link-0">
                                    </div>
                                    <div>
                                        <label for="reference-accessed_at-0">Acessado as</label>
                                        <input type="date" name="reference-accessed_at-0" id="reference-accessed_at-0">
                                    </div>
                                    <div>
                                        <button id="generate-abnt-button-0" class="generate-abnt-button">Gerar ABNT</button>
                                    </div>
                                </div>
                                <div>
                                    <textarea name="reference-0" id="reference-0" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="bg-amber-300 hover:bg-amber-500 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Postar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('.generate-abnt-button');

        buttons.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault();

                const id = button.id.split('generate-abnt-button-')[1]
                const url = document.querySelector("#reference-link-"+id).value
                const datetime = document.querySelector("#reference-accessed_at-"+id).value

                if(!url || !datetime) {
                    alert("Faltam informacoes")
                    return;
                }

                try {
                    const data = await axios.get("{{ route('api.blog.webscraping', ['url'=>'']) }}" + encodeURIComponent(url) + "&accessed_at="+datetime)
                    
                    const textarea = document.querySelector("#reference-"+id);
                    textarea.innerHTML = data.data.reference
                    console.log(data)
                } catch(e) {
                    console.log(e)
                    alert(e.response.data)
                }
            })
        });

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