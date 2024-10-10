<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- MENSAGEM DE SUCESSO DO BACK -->
                    @if (session('status'))
                    <div class="p-4 mb-4 text-lg text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('status') }}</span>
                    </div>
                    @endif
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">#</th>
                                <th scope="col" class="px-4 py-2">Nome</th>
                                <th scope="col" class="px-4 py-2">Email</th>
                                <th scope="col" class="px-4 py-2">Relatórios</th>
                                <th scope="col" class="px-4 py-2">Contas</th>
                                <th scope="col" class="px-4 py-2">Permissão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('users.updateRoles') }}" method="POST">
                                @csrf
                                @foreach($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">
                                        <button class="bg-gray-500 text-white px-3 py-1 rounded">Visualizar</button>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <button class="bg-gray-500 text-white px-3 py-1 rounded">Visualizar</button>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <div class="mb-4">
                                            <label for="role-{{ $user->id }}" class="block text-gray-900 dark:text-gray-100 text-sm font-bold mb-2">Permissão</label>
                                            <select name="role[{{ $user->id }}]" id="role-{{ $user->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="basic" {{ $user->role == 'basic' ? 'selected' : '' }}>Usuário</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <button type="submit" class="p-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200 ease-in-out shadow-lg">Salvar</button>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
