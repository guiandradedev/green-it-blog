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

                    <p><strong>Nome:  </strong> {{ $contact->name}}</p><br>
                    <p><strong>Email:  </strong> {{ $contact->email}}</p><br>
                    <p><strong>Conteúdo da mensagem: </strong> {!! $contact->content !!}</p><br>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>