<x-app-layout title="أنشاء كيان">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">إضافة صلاحية جديدة</h2>
        <div class="text-sm text-gray-500">الرئيسية / الصلاحيات / إضافة</div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl mx-auto">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf

            <div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">الاسم</label>

    <input 
        type="text" 
        name="name" 
        id="name" 
        class="
            w-full px-3 py-2 bg-white
            border border-gray-300 rounded-lg shadow-sm 
            text-gray-900 
            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
            transition duration-150 ease-in-out
            @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror
        "
        placeholder="ادخل الاسم هنا..."
    >

    @error('name') 
        <p class="mt-1 text-red-600 text-sm">{{ $message }}</p> 
    @enderror
</div>


            <div class="flex justify-end">
                <a href="{{ route('permissions.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg ml-2 hover:bg-gray-200 transition-colors">إلغاء</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">حفظ</button>
            </div>
        </form>
    </div>
</x-app-layout>