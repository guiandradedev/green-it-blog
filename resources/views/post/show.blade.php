<x-app-layout>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
                @endif

                <p><strong>Título:  </strong> {{ $post->title}}</p><br>
                <p><strong>Subtítulo:  </strong> {{ $post->subtitle}}</p><br>

                <p><strong>Conteúdo: </strong> {!! $post->content !!}</p><br>
                <h1>Imagem</h1>
                <img src="{{ asset('storage/thumbnails'. $post->thumbnail->file_path) }}" alt="">

                <div class="flex items-center ml-auto float-down">
                    <a href="{{ route('post.edit', [$post->slug]) }}" class="bg-amber-300 hover:bg-amber-500 text-black font-bold py-2 px-4 rounded">
                        <div class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4">
                            Editar
                        </div>
                    </a>
                </div>

                <div>
                    <h1>Comentarios</h1>
                    <form action="{{ route('post.comment.store', ['post'=>$post->slug]) }}" method="POST">
                        @csrf
                        <label for="content">Comentario</label>
                        <input type="text" name="content" id="content">
                        <button type="submit">Comentar</button>
                    </form>
                    <hr>
                    @if(!count($comments) == 0)
                        @foreach ($comments as $comment)
                        {{ $comment['content'] }}
                        <form action="{{ route('post.comment.delete', ['post'=>$post->slug, 'comment'=>$comment->id]) }}" method="POST">
                            @csrf()
                            @method('delete')
                            <button type="submit">Deletar</button>
                        </form>
                        <br>
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>