<x-app-layout title="المستخدمون">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">إدارة المستخدمين</h2>
            <div class="text-sm text-gray-500">الرئيسية / المستخدمون</div>
        </div>
        <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            إضافة مستخدم
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">الرقم</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">الاسم</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">البريد الإلكتروني</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">الأدوار</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm">
                                @forelse($user->roles as $role)
                                    <span class="bg-blue-200 text-blue-800 px-2 py-1 m-1 rounded-full text-xs inline-block">{{ $role->name }}</span>
                                @empty
                                    <span class="text-gray-500">لا يوجد</span>
                                @endforelse
                            </td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 ml-3">تعديل</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">لا يوجد مستخدمون حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">{{ $users->links() }}</div>
    </div>
</x-app-layout>
