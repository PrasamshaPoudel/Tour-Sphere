@extends('layouts.app')

@section('title', 'Blog Management - Admin Panel')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">📝 Blog Management</h1>
            <p class="text-gray-600 mt-2">Manage your travel blog posts</p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Blog Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        {{ isset($blog) ? 'Edit Blog Post' : 'Add New Blog Post' }}
                    </h2>
                    
                    <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @if(isset($blog))
                            @method('PUT')
                        @endif

                        <div class="space-y-4">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                                <input type="text" 
                                       name="title" 
                                       id="title"
                                       value="{{ old('title', $blog->title ?? '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       required>
                            </div>

                            <!-- Author -->
                            <div>
                                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Author *</label>
                                <input type="text" 
                                       name="author" 
                                       id="author"
                                       value="{{ old('author', $blog->author ?? '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                       required>
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                                <input type="file" 
                                       name="image" 
                                       id="image"
                                       accept="image/*"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @if(isset($blog) && $blog->image)
                                    <div class="mt-2">
                                        <img src="{{ asset($blog->image) }}" alt="Current image" class="w-20 h-20 object-cover rounded">
                                        <p class="text-sm text-gray-500">Current image</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content *</label>
                                <textarea name="content" 
                                          id="content"
                                          rows="8"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                          required>{{ old('content', $blog->content ?? '') }}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" 
                                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    {{ isset($blog) ? 'Update Blog Post' : 'Create Blog Post' }}
                                </button>
                            </div>

                            @if(isset($blog))
                            <!-- Cancel Button -->
                            <div>
                                <a href="{{ route('admin.blog.manage') }}" 
                                   class="w-full bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 text-center block">
                                    Cancel
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Blog List -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">All Blog Posts</h2>
                    </div>
                    
                    @if($blogs->count() > 0)
                        <div class="divide-y divide-gray-200">
                            @foreach($blogs as $blogItem)
                            <div class="p-6 hover:bg-gray-50">
                                <div class="flex items-start space-x-4">
                                    @if($blogItem->image)
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($blogItem->image) }}" 
                                             alt="{{ $blogItem->title }}" 
                                             class="w-16 h-16 object-cover rounded">
                                    </div>
                                    @endif
                                    
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                                            {{ $blogItem->title }}
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            By {{ $blogItem->author }} • {{ $blogItem->created_at->format('M d, Y') }}
                                        </p>
                                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                                            {{ Str::limit(strip_tags($blogItem->content), 100) }}
                                        </p>
                                    </div>
                                    
                                    <div class="flex-shrink-0 flex space-x-2">
                                        <a href="{{ route('blog.show', $blogItem->slug) }}" 
                                           target="_blank"
                                           class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            View
                                        </a>
                                        <a href="{{ route('admin.blog.edit', $blogItem->id) }}" 
                                           class="text-green-600 hover:text-green-800 text-sm font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $blogItem->id) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-6 text-center">
                            <div class="text-4xl mb-4">📝</div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Blog Posts Yet</h3>
                            <p class="text-gray-600">Create your first blog post to get started!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection



