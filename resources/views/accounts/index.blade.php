<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-slot name="header">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Accounts') }}
                        </h2>
                        <a href="{{ route('accounts.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Adicionar Conta
                        </a>
                    </div>
                </x-slot>
                <!-- MENSAGEM DE ERRO DO BACK -->
                @if (session('error'))
                <div class="p-4 mb-4 text-lg text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ session('error') }}</span>.
                </div>
                @endif

                <!-- MENSAGEM DE SUCESSO DO BACK -->
                @if (session('status'))
                <div class="p-4 mb-4 text-lg text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
                @endif

                <!-- MENSAGEM DE ERROS DE VALIDAÇÃO -->
                @if ($errors->any())
                <div class="p-4 mb-4 text-lg text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li><span class="font-medium">{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="overflow-y-auto max-h-screen p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">Titulo</th>
                                <th scope="col" class="px-4 py-2">Descrição</th>
                                <th scope="col" class="px-4 py-2">Valor</th>
                                <th scope="col" class="px-4 py-2">Vencimento</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                                @can('isAdmin', auth()->user())
                                <th scope="col" class="px-4 py-2">Criado por</th>
                                @endcan
                                <th scope="col" class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        @foreach ($accounts as $account)
                        @can('show' ,$account)
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $account->titulo }}</td>
                                <td class="border px-4 py-2">{{$account->descricao}}</td>
                                <td class="border px-4 py-2">{{$account->valor}}</td>
                                <td class="border px-4 py-2">{{$account->data_vencimento}}</td>
                                <td class="border px-4 py-2">{{$account->status}}</td>
                                @can('isAdmin', auth()->user())
                                <td class="border px-4 py-2">{{ $account->user->name }}</td>
                                @endcan
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('accounts.edit', $account->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded text-center">
                                            Editar
                                        </a>
                                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Excluir" onclick="return confirm('Tem certeza de que deseja excluir esta anotação?');" class="bg-red-500 text-white px-3 py-2 rounded">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endcan
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
