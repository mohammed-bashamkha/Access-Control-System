<x-app-layout title="تعديل المستخدم">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">تعديل المستخدم: <span class="text-blue-600">{{ $user->name }}</span></h2>
        <div class="text-sm text-gray-500">الرئيسية / المستخدمون / تعديل</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium">اسم المستخدم</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required>
                    @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required>
                    @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium">كلمة المرور (اختياري)</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="اتركه فارغاً لعدم التغيير">
                    @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium">تأكيد كلمة المرور</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                </div>
            </div>

            <!-- Roles -->
            <div class="mt-6">
                <label class="block mb-3 text-sm font-medium">الأدوار</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($roles as $role)
                        <div class="flex items-center p-2 border rounded-lg">
                            <input id="role-{{ $role->id }}" name="roles[]" type="checkbox" value="{{ $role->name }}" class="w-4 h-4 text-blue-600 rounded"
                                @if($user->hasRole($role->name)) checked @endif>
                            <label for="role-{{ $role->id }}" class="ms-2 text-sm">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('roles') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-start mt-8">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">تحديث المستخدم</button>
                <a href="{{ route('users.index') }}" class="ms-4 text-sm text-gray-600 hover:text-gray-900">إلغاء</a>
            </div>
        </form>
    </div>
</x-app-layout>
