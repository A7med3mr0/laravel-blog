<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center flex-wrap gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog Dashboard') }}
            </h2>

            <!-- زر تسجيل الخروج مدمج في الهيدر بشكل أنيق -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold rounded-lg transition duration-150 ease-in-out">
                    ← {{ __('Logout') }}
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- رسالة الترحيب -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-950 font-medium">
                    {{ __("Welcome back! You're securely logged in.") }}
                </div>
            </div>

            <!-- أزرار الاختصارات السريعة (Quick Actions) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- كارت الانتقال للمقالات -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Manage Articles</h3>
                        <p class="text-gray-500 text-sm mb-4">View the list of all blog articles, edit their content, or delete outdated posts.</p>
                    </div>
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition duration-150 shadow-sm shadow-blue-200">
                        Open Articles List
                    </a>
                </div>

                <!-- كارت إضافة مقال جديد مباشرة -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Write New Post</h3>
                        <p class="text-gray-500 text-sm mb-4 font-normal">Ready to share something new? Create a brand new blog post right away.</p>
                    </div>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm rounded-lg transition duration-150 shadow-sm shadow-emerald-200">
                        + Create New Post
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
