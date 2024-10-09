<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-slot name="header">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Accounts') }}
                        </h2>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Adicionar Conta
                        </button>
                    </div>
                </x-slot>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">Titulo</th>
                                <th scope="col" class="px-4 py-2">Descrição</th>
                                <th scope="col" class="px-4 py-2">Valor</th>
                                <th scope="col" class="px-4 py-2">Vencimento</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                                <th scope="col" class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        @foreach ($accounts as $account)
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $account->titulo }}</td>
                                <td class="border px-4 py-2">{{$account->descricao}}</td>
                                <td class="border px-4 py-2">{{$account->valor}}</td>
                                <td class="border px-4 py-2">{{$account->data_vencimento}}</td>
                                <td class="border px-4 py-2">{{$account->status}}</td>
                                <td class="border px-4 py-2">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Editar</button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">Excluir</button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
