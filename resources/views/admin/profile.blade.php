@extends('admin.layouts.app')

@section('title', 'Profile')
@section('page-title', 'Profile')

@section('content')
<div class="row">

    {{-- Column 1: Profile Image, Name, Email --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-user me-2"></i> Profile Info</h5>
            </div>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="form_type" value="info">

                    {{-- Profile Image --}}
                    <div class="mb-4 text-center">
                        <div class="mb-3">
                            @if($user->profile_image)
                                <img id="preview" src="{{ asset('storage/' . $user->profile_image) }}"
                                     alt="Profile" class="rounded-circle border"
                                     style="width:120px;height:120px;object-fit:cover;">
                            @else
                                <img id="preview" src="{{ asset('Admin/images/default-avatar.png') }}"
                                     alt="Profile" class="rounded-circle border"
                                     style="width:120px;height:120px;object-fit:cover;">
                            @endif
                        </div>
                        <label class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-camera me-1"></i> Change Photo
                            <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                   class="d-none @error('profile_image') is-invalid @enderror"
                                   onchange="previewImage(this)">
                        </label>
                        @error('profile_image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        <div class="text-muted small mt-1">JPG, PNG, GIF or WEBP — max 2MB</div>
                    </div>

                    <hr>

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-1"></i> Save Info
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- Column 2: Change Password --}}
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-lock me-2"></i> Change Password</h5>
            </div>
            <div class="card-body">

                @if(session('password_success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>{{ session('password_success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.profile.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="form_type" value="password">

                    {{-- Old Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Old Password</label>
                        <div class="input-group">
                            <input type="password" name="old_password" id="old_password"
                                   class="form-control @error('old_password') is-invalid @enderror"
                                   placeholder="Enter current password">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePass('old_password')">
                                <i class="fas fa-eye" id="old_password-icon"></i>
                            </button>
                        </div>
                        @error('old_password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- New Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Enter new password">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePass('password')">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                        @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" placeholder="Confirm new password">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePass('password_confirmation')">
                                <i class="fas fa-eye" id="password_confirmation-icon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning px-4">
                        <i class="fas fa-key me-1"></i> Update Password
                    </button>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => document.getElementById('preview').src = e.target.result;
            reader.readAsDataURL(input.files[0]);
        }
    }

    function togglePass(id) {
        const input = document.getElementById(id);
        const icon  = document.getElementById(id + '-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection
