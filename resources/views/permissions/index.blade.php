<x-app-layout title="الصلاحيات">

    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">(صلاحيات المستخدمين)</h2>
            <div class="text-sm text-gray-500">الرئيسية / الصلاحيات</div>
        </div>
        <a href="{{ route('permissions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            إضافة صلاحية جديدة
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
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">الرقم</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">النوع (Guard)</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($permissions as $permission)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- ✅ تصحيح: عرض اسم الصلاحية --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $permission->name }}</td>
                            
                            {{-- ✅ تصحيح: عرض النوع (guard_name) --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $permission->guard_name }}</td>

                            {{-- ملاحظة: لقد حذفت أعمدة "رقم الهاتف" و "ملاحظات" لأنها لا توجد عادةً في جدول الصلاحيات. يمكنك إضافتها إذا كان تصميمك مختلفًا. --}}

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                {{-- ✅ تصحيح: استخدام $permission->id و route('permissions.edit') --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-600 hover:text-blue-900 ml-3">تعديل</a>
                                
                                {{-- ✅ تصحيح: استخدام $permission->id و route('permissions.destroy') --}}
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            {{-- ✅ تصحيح: يجب أن يكون colspan مساوياً لعدد الأعمدة في aلـ thead --}}
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">لا توجد صلاحيات مضافة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $permissions->links() }}
        </div>
    </div>
</x-app-layout>
