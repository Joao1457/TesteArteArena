<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">#</th>
                                <th scope="col" class="px-4 py-2">Nome</th>
                                <th scope="col" class="px-4 py-2">Email</th>
                                <th scope="col" class="px-4 py-2">Permissões</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="border px-4 py-2">1</th>
                                <td class="border px-4 py-2">João Paulo Marques</td>
                                <td class="border px-4 py-2">dewitt5609@uorak.com</td>
                                <td class="border px-4 py-2">
                                    <div class="flex items-center mb-4">
                                        <input id="admin-radio" name="role" type="radio" value="admin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="admin-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Administrador</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="user-radio" name="role" type="radio" value="user" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="user-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuário</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

