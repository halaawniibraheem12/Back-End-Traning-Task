@extends('layouts.app')

@section('title', 'Categories - Cosmetics Management')

@section('content')
<div class="space-y-8 animate-fade-in">

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-white to-blue-50 rounded-2xl shadow-xl p-8 border border-blue-100">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 font-['Playfair_Display'] mb-2">
                    <i class="fas fa-tags text-blue-500 mr-3"></i>
                    Categories Management
                </h1>
                <p class="text-gray-600 text-lg">Organize your cosmetic products into categories</p>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text"
                           id="categorySearch"
                           placeholder="Search categories..."
                           class="w-full md:w-64 px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>

                <a href="{{ route('categories.create') }}"
                   class="px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-cyan-600 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add Category</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Flash Messages (Global) -->
    @if(session('success'))
        <div class="flash-message success mb-4 animate-fade-in">
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-check-circle text-xl"></i>
                    <div>
                        <p class="font-semibold">Success!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" onclick="this.closest('.flash-message').remove()" class="text-white/80 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="flash-message error mb-4 animate-fade-in">
            <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-exclamation-circle text-xl"></i>
                    <div>
                        <p class="font-semibold">Error!</p>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
                <button type="button" onclick="this.closest('.flash-message').remove()" class="text-white/80 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Categories Grid -->
    @if($categories->count() > 0)
        <div id="categoriesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($categories as $category)
                <div class="category-card bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 group"
                     data-name="{{ strtolower($category->name) }}">

                    <!-- Card Header -->
                    <div class="p-6 border-b border-gray-200 flex items-center">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center mr-4">
                            <i class="fas fa-tag text-white text-xl"></i>
                        </div>

                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-bold text-gray-900 truncate">
                                {{ $category->name }}
                            </h3>

                            <div class="flex items-center space-x-2 mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                                    <i class="fas fa-box mr-1"></i>
                                    {{ $category->products_count ?? 0 }} Products
                                </span>
                            </div>
                        </div>

                        <!-- Dropdown (Edit/Delete) -->
                        <div class="relative">
                            <button type="button"
                                    class="w-8 h-8 rounded-lg hover:bg-gray-100 flex items-center justify-center text-gray-500">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>

                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-2xl border border-gray-200 py-2 z-10 hidden group-hover:block">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="flex items-center space-x-3 px-4 py-3 hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-edit text-blue-500"></i>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete (Modal Trigger) -->
                                <button type="button"
                                        class="w-full flex items-center space-x-3 px-4 py-3 hover:bg-red-50 transition-colors text-red-500 open-delete-modal"
                                        data-action="{{ route('categories.destroy', $category) }}">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete</span>
                                </button>

                                {{-- Bonus: Quick link (optional) --}}
                                <a href="{{ route('products.index', ['category' => $category->name]) }}"
                                   class="flex items-center space-x-3 px-4 py-3 hover:bg-green-50 transition-colors">
                                    <i class="fas fa-eye text-green-500"></i>
                                    <span>View Products</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Optional Description (won't break if null) -->
                    @if(!empty($category->description))
                        <div class="p-6">
                            <p class="text-sm text-gray-600">
                                {{ \Illuminate\Support\Str::limit($category->description, 120) }}
                            </p>
                        </div>
                    @endif

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-xs text-gray-500">
                            <i class="far fa-clock mr-1"></i>
                            Created {{ $category->created_at?->diffForHumans() ?? '' }}
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('categories.edit', $category) }}"
                               class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 flex items-center justify-center transition-colors duration-200">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete (Modal Trigger) -->
                            <button type="button"
                                    class="w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 flex items-center justify-center transition-colors duration-200 open-delete-modal"
                                    data-action="{{ route('categories.destroy', $category) }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-xl p-12 text-center">
            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-r from-blue-100 to-cyan-100 flex items-center justify-center">
                <i class="fas fa-tags text-4xl text-blue-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">No Categories Found</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Categories help organize your products. Create your first category to get started.
            </p>
            <a href="{{ route('categories.create') }}"
               class="px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-cyan-600 transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Create First Category
            </a>
        </div>
    @endif

    <!-- Pagination -->
    @if($categories->hasPages())
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
            <div class="flex items-center justify-between">
                <p class="text-gray-600">
                    Showing <span class="font-semibold">{{ $categories->firstItem() }}</span> to
                    <span class="font-semibold">{{ $categories->lastItem() }}</span> of
                    <span class="font-semibold">{{ $categories->total() }}</span> categories
                </p>
                <div class="flex items-center space-x-2">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    @endif

</div>

<!-- DELETE MODAL -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true">
    <div id="deleteModalBackdrop" class="fixed inset-0 bg-black/50"></div>

    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-xl shadow-2xl overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900">Confirm Delete</h3>
                <p class="mt-2 text-gray-600">
                    Are you sure you want to delete this category?
                </p>
            </div>

            <div class="px-6 pb-6 flex justify-end gap-3">
                <button type="button"
                        id="cancelDeleteBtn"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </button>

                <form id="deleteCategoryForm" method="POST" action="">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in { animation: fadeIn .5s ease; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    .group:hover .group-hover\:block { display: block; }
    .category-card:hover { transform: translateY(-4px); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Search categories (by name)
    const searchInput = document.getElementById('categorySearch');
    const cards = document.querySelectorAll('.category-card');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const term = this.value.toLowerCase().trim();

            cards.forEach(card => {
                const name = card.getAttribute('data-name') || '';
                card.style.display = name.includes(term) ? 'block' : 'none';
            });
        });
    }

    // Auto-hide flash messages
    document.querySelectorAll('.flash-message').forEach(msg => {
        setTimeout(() => {
            msg.style.opacity = '0';
            msg.style.transform = 'translateY(-10px)';
            msg.style.transition = 'all .5s ease';
            setTimeout(() => msg.remove(), 500);
        }, 5000);
    });

    // Delete Modal Logic
    const modal = document.getElementById('deleteModal');
    const backdrop = document.getElementById('deleteModalBackdrop');
    const cancelBtn = document.getElementById('cancelDeleteBtn');
    const deleteForm = document.getElementById('deleteCategoryForm');

    function openModal(actionUrl) {
        deleteForm.action = actionUrl;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
        deleteForm.action = '';
    }

    document.querySelectorAll('.open-delete-modal').forEach(btn => {
        btn.addEventListener('click', () => openModal(btn.dataset.action));
    });

    cancelBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});
</script>
@endsection
