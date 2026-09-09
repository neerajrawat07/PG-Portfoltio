{{--
    Title       : Product Management
    Description : Admin page for managing main products. Displays all products in a list
                  with options to add, edit, delete, and toggle active/inactive status.
                  Also includes page settings for banner title, description, and image.
    URL         : /admin/main-product
--}}
@extends('admin.layouts.app')

@section('title', 'Product Management')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Page Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        {{-- Page Settings Card --}}
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> Page Settings & Banner</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <form action="{{ route('admin.main-product.update-settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_title">Page Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="page_title" name="page_title" value="{{ old('page_title', $settings->page_title) }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="page_subtitle">Page Subtitle</label>
                                <textarea class="form-control" id="page_subtitle" name="page_subtitle" rows="2">{{ old('page_subtitle', $settings->page_subtitle) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5><i class="fas fa-image"></i> Banner Settings</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_title">Banner Title</label>
                                <input type="text" class="form-control" id="banner_title" name="banner_title" value="{{ old('banner_title', $settings->banner_title) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_description">Banner Description</label>
                                <input type="text" class="form-control" id="banner_description" name="banner_description" value="{{ old('banner_description', $settings->banner_description) }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="banner_image">Banner Image</label>
                                @if($settings->banner_image)
                                    <div class="mb-2">
                                        <img src="{{ asset($settings->banner_image) }}" alt="Current Banner" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control-file" id="banner_image" name="banner_image" accept="image/*">
                                <small class="form-text text-muted">Recommended size: 1920x600 pixels</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Settings
                    </button>
                </div>
            </form>
        </div>

        {{-- Products List Card --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-box"></i> Product List</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.main-product.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 100px">Image</th>
                            {{-- <th>Title</th> --}}
                            {{-- <th>Description</th> --}}
                            <th style="width: 80px">Order</th>
                            <th style="width: 100px">Status</th>
                            <th style="width: 200px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="img-thumbnail" style="max-height: 60px;">
                            </td>
                            {{-- <td>{{ $product->title }}</td> --}}
                            {{-- <td>{{ Str::limit($product->description, 50) }}</td> --}}
                            <td>
                                <span class="badge badge-dark" style="color: #000;">{{ $product->order }}</span>
                            </td>
                            <td>
                                <form action="{{ route('admin.main-product.toggle-status', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $product->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        <i class="fas fa-{{ $product->is_active ? 'check' : 'times' }}"></i>
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.main-product.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.main-product.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <p class="text-muted my-3">No products found. <a href="{{ route('admin.main-product.create') }}">Add your first product</a></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
