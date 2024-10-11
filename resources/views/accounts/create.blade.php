<x-app-layout>
    <div class="container mx-auto mt-10">
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Adicionando conta') }}
                </h2>
            </div>
        </x-slot>

        <!-- MENSAGEM DE ERRO DO BACK -->
        @if (session('error'))
        <div class="p-4 mb-4 text-lg text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ session('error') }}</span>
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

        <!-- Formulario de criação -->
        <form action="{{ route('accounts.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="titulo" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Título*</label>
                <input type="text" name="titulo" id="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Título da conta" >
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Descrição*</label>
                <textarea name="descricao" id="descricao" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Descrição da conta" ></textarea>
            </div>

            <div class="mb-4">
                <label for="valor" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Valor*</label>
                <input type="number" pattern="^(([1-9]\d{0,2}(\. \d{3})*)|(([1-9]\. \d*)?" name="valor" id="valor" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Valor da conta" >
            </div>

            <div class="mb-4">
                <label for="data_vencimento" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Data de Vencimento*</label>
                <input type="date" pattern="\d{2}/\d{2}/\d{4}" name="data_vencimento" id="data_vencimento"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Status*</label>
                <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="pago">Pago</option>
                    <option value="pendente">Pendente</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Criar Conta
                </button>
                <a href="{{ route('accounts.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
