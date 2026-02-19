<x-app-layout title="تعديل الدور: {{ $role->name }}">

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">تعديل الدور: <span class="text-blue-600">{{ $role->name }}</span></h2>
        <div class="text-sm text-gray-500">الرئيسية / الأدوار / تعديل</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        {{-- فرق 1: مسار الإرسال (action) والطريقة (method) --}}
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- نستخدم PUT للتحديث --}}

            {{-- حقل اسم الدور --}}
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">اسم الدور</label>
                {{-- فرق 2: ملء الحقل بالبيانات الحالية --}}
                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- قسم الصلاحيات --}}
            <div class="mb-6">
                <label class="block mb-3 text-sm font-medium text-gray-900">الصلاحيات</label>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($permissions as $permission)
                        <div class="flex items-center p-2 border rounded-lg hover:bg-gray-50">
                            <input id="permission-{{ $permission->id }}" name="permissions[]" type="checkbox"
                                   value="{{ $permission->name }}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                   {{-- فرق 3: تحديد الصلاحيات الممنوحة مسبقاً --}}
                                   @if($role->hasPermissionTo($permission->name)) checked @endif
                                   >
                            <label for="permission-{{ $permission->id }}" class="ms-2 text-sm font-medium text-gray-900">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @empty
                        <p class="text-gray-500">لا توجد صلاحيات معرفة بعد.</p>
                    @endforelse
                </div>
                @error('permissions')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- أزرار التحكم --}}
            <div class="flex items-center justify-start mt-8">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    تحديث الدور
                </button>
                <a href="{{ route('roles.index') }}" class="ms-4 text-sm text-gray-600 hover:text-gray-900">
                    إلغاء
                </a>
            </div>
        </form>
    </div>

</x-app-layout>
