<x-app-layout title="لوحة التحكم">

    <!-- Page Heading -->
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">لوحة التحكم</h2>
        <div class="text-sm text-gray-500">الرئيسية / لوحة التحكم</div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-blue-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">عدد المستخدمين</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1
                             m4-4a4 4 0 11-8 0 4 4 0 018 0" />
                </svg>
            </div>
        </div>

        <!-- Total Roles -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-purple-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">عدد الأدوار</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalRoles ?? 0 }}</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M12 3l8 4v5c0 5-3.5 9-8 9s-8-4-8-9V7l8-4z" />
                </svg>
            </div>
        </div>

        <!-- Total Permissions -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-green-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">عدد الصلاحيات</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalPermissions ?? 0 }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Admin Users -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-between border-r-4 border-yellow-500">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">المسؤولون</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalAdmins ?? 0 }}</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3
                             1.343 3 3 3zm0 2c-3.314 0-6 1.343-6 3v1h12v-1
                             c0-1.657-2.686-3-6-3z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">أحدث المستخدمين</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead>
                    <tr class="text-gray-500 border-b">
                        <th class="pb-3 text-sm font-medium">الاسم</th>
                        <th class="pb-3 text-sm font-medium">البريد الإلكتروني</th>
                        <th class="pb-3 text-sm font-medium">الدور</th>
                        <th class="pb-3 text-sm font-medium">تاريخ الإنشاء</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($recentUsers as $user)
                        <tr class="border-b last:border-0 hover:bg-gray-50 transition">
                            <td class="py-3 font-medium text-gray-800">{{ $user->name }}</td>
                            <td class="py-3 text-gray-600">{{ $user->email }}</td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold">
                                    {{ $user->roles->first()->name ?? 'بدون دور' }}
                                </span>
                            </td>
                            <td class="py-3 text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">
                                لا يوجد مستخدمون حديثًا
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>