<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">#</th>
                                <th scope="col" class="px-4 py-2">Titulo</th>
                                <th scope="col" class="px-4 py-2">Descrição</th>
                                <th scope="col" class="px-4 py-2">Valor</th>
                                <th scope="col" class="px-4 py-2">Vencimento</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                                <th scope="col" class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="border px-4 py-2">1</th>
                                <td class="border px-4 py-2">Conta de Luz</td>
                                <td class="border px-4 py-2">conta de energia</td>
                                <td class="border px-4 py-2">130,00</td>
                                <td class="border px-4 py-2">13/02/2024</td>
                                <td class="border px-4 py-2">Pago</td>
                                <td class="border px-4 py-2">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Editar</button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">Excluir</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
