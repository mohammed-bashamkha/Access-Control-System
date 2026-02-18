<aside class="w-64 bg-[#1e1e2d] text-white fixed right-0 h-full flex flex-col shadow-lg z-50">

    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-700">
        <h1 class="text-xl font-bold tracking-wide text-center px-2">
            إدارة أدوار وصلاحيات المستخدمين
        </h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-6 py-3 transition-colors
                   {{ request()->routeIs('dashboard') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:bg-[#2b2b40] hover:text-white' }}">
                   
                    <!-- Dashboard Icon -->
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-10l2 2" />
                    </svg>

                    لوحة التحكم
                </a>
            </li>

            <!-- Users -->
            <li>
                <a href="{{ route('users.index') }}"
                   class="flex items-center px-6 py-3 transition-colors
                   {{ request()->routeIs('users.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:bg-[#2b2b40] hover:text-white' }}">
                   
                    <!-- Users Icon -->
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1
                                 m4-4a4 4 0 11-8 0 4 4 0 018 0
                                 m6 4a3 3 0 10-6 0 3 3 0 006 0" />
                    </svg>

                    إدارة المستخدمين
                </a>
            </li>

            <!-- Roles -->
            <li>
                <a href="{{ route('roles.index') }}"
                   class="flex items-center px-6 py-3 transition-colors
                   {{ request()->routeIs('roles.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:bg-[#2b2b40] hover:text-white' }}">
                   
                    <!-- Shield / Roles Icon -->
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l8 4v5c0 5-3.5 9-8 9s-8-4-8-9V7l8-4z" />
                    </svg>

                    إدارة الأدوار
                </a>
            </li>

            <!-- Permissions -->
            <li>
                <a href="{{ route('permissions.index') }}"
                   class="flex items-center px-6 py-3 transition-colors
                   {{ request()->routeIs('permissions.*') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:bg-[#2b2b40] hover:text-white' }}">
                   
                    <!-- Check / Permissions Icon -->
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    إدارة الصلاحيات
                </a>
            </li>

            <!-- About -->
            <li>
                <a href="{{ route('about') }}"
                   class="flex items-center px-6 py-3 transition-colors
                   {{ request()->routeIs('about') ? 'bg-blue-600 border-l-4 border-blue-400' : 'text-gray-300 hover:bg-[#2b2b40] hover:text-white' }}">
                   
                    <!-- Info Icon -->
                    <svg class="w-5 h-5 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              d="M13 16h-1v-4h-1m1-4h.01
                                 M12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>

                    عنا
                </a>
            </li>

        </ul>
    </nav>
</aside>
