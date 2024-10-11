<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Relatorio de usuário') }} {{ $user->name }}
                    </h2>
                </div>
            </x-slot>
            <!-- Tabela trazendo tudo referente ao usuario -->
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if ($accounts->isEmpty())
                <p class="text-center text-gray-500">Nenhuma conta encontrada para este usuário.</p>
                @else
                <div class="overflow-y-auto max-h-screen">
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">Titulo</th>
                                <th scope="col" class="px-4 py-2">Descrição</th>
                                <th scope="col" class="px-4 py-2">Valor</th>
                                <th scope="col" class="px-4 py-2">Vencimento</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                                <th scope="col" class="px-4 py-2">Criado por</th>
                                <th scope="col" class="px-4 py-2">Data da criação</th>
                            </tr>
                        </thead>
                        @foreach ($accounts as $account)
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $account->titulo }}</td>
                                <td class="border px-4 py-2">{{ $account->descricao }}</td>
                                <td class="border px-4 py-2">{{ $account->valor }}</td>
                                <td class="border px-4 py-2">{{ $account->data_vencimento }}</td>
                                <td class="border px-4 py-2">{{ $account->status }}</td>
                                <td class="border px-4 py-2">{{ $account->user->name }}</td>
                                <td class="border px-4 py-2">{{ $account->created_at->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
