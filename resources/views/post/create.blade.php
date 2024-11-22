<x-app-layout>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script> --}}
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

                    <form class="w-full" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="form">

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
                            <div id="form-rows">

                                <div class="w-full px-3 mb-6 md:mb-0 references" id="reference-base">
                                    <div class="flex w-100">
                                        <div>
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="reference-link-0">
                                                Link do site
                                            </label>
                                            <input required class="reference-link appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="reference-link-0" type="text" placeholder="https://link" name="reference[0][link]" value="{{old('reference-link-0')}}">
                                        </div>
                                        <div class="mx-4">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="reference-accessed_at-0">
                                                Acessado as
                                            </label>
                                            <input required class="accessed_at appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="reference-accessed_at-0" type="date" name="reference[0][accessed_at]" value="{{old('reference-accessed_at-0')}}">
                                        </div>
                                        <div class="content-center">
                                            <button id="generate-abnt-button-0" class="generate-abnt-button bg-amber-300 hover:bg-amber-500 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Gerar ABNT</button>
                                            <button class=" mx-2 add-reference bg-amber-300 hover:bg-amber-500 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">+</button>
                                        </div>
                                    </div>
                                    <div>
                                        <textarea required ="reference[0][content]" id="reference-0" cols="30" rows="10" class="references"></textarea>
                                    </div>
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

    <script type="module">

        const buttons = document.querySelectorAll('.generate-abnt-button');
        let counter = 0;

        buttons.forEach(button => {
            button.addEventListener('click', async e => {
                e.preventDefault();

                await generateABNT(button)
            })
        });

        const button = document.querySelector(".add-reference")
        button.addEventListener('click', e=>{
            e.preventDefault()
            clonarCampos();
        })

        function clonarCampos() {
                counter++;
                const camposOriginais = document.querySelector('#reference-base');
                const novoCampos = camposOriginais.cloneNode(true);

                novoCampos.id = ""

                novoCampos.querySelectorAll('input').forEach((input) => {
                    input.id = input.id.replace(/\d+/, counter);
                    input.name = input.name.replace(/\d+/, counter);
                    input.value = '';
                });
                novoCampos.querySelectorAll('button').forEach((button) => {
                    button.id = button.id.replace(/\d+/, counter);
                });
    
                novoCampos.querySelectorAll('label').forEach((label) => {
                    const novoFor = label.getAttribute('for').replace(/\d+/, counter);
                    label.setAttribute('for', novoFor);
                });

                novoCampos.id = novoCampos.id.replace(/\d+/, counter)

                const textarea = novoCampos.querySelector('textarea')
                textarea.innerHTML = ""
                textarea.id = textarea.id.replace(/\d+/, counter);
                textarea.name = textarea.name.replace(/\d+/, counter);
    
                document.getElementById('form-rows').appendChild(novoCampos);
                novoCampos.querySelector(".add-reference").addEventListener('click', e=>{
                    e.preventDefault()
                    clonarCampos()
                })
                const button = novoCampos.querySelector("#generate-abnt-button-"+counter)
                button.addEventListener('click', async e=>{
                    e.preventDefault()
                    await generateABNT(button)
                })
            }

        async function generateABNT(button) {
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
            } catch(e) {
                console.log(e)
                alert(e.response.data)
            }
        }

        const form = document.querySelector("#form")
        form.addEventListener('submit', async function(e) {
            // e.preventDefault()

            // const reference_link = document.querySelectorAll(".reference-link")
            // const accessed_at = document.querySelectorAll(".accessed_at")
            // const references = document.querySelectorAll(".references")
        })

    </script>
</x-app-layout>