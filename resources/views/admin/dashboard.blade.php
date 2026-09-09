@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
{{-- <div class="dashboard-header mb-4">
    <h2>Welcome back, {{ Auth::user()->name }}!</h2>
    <p class="text-muted">Here's what's happening with your website today.</p>
</div> --}}

<!-- Stats Cards Row -->
<div class="row g-4 mb-4">
    <!-- Sliders -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-primary">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Total Sliders</h6>
                    <h3 class="stats-value">{{ $totalSliders ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> Homepage Sliders</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-success">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Total Products</h6>
                    <h3 class="stats-value">{{ $totalProducts ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> Product Listings</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-warning">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Total Features</h6>
                    <h3 class="stats-value">{{ $totalFeatures ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> Feature Items</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Images -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-danger">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Gallery Images</h6>
                    <h3 class="stats-value">{{ $totalImages ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> Total Images</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-images"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Videos -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-info">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Gallery Videos</h6>
                    <h3 class="stats-value">{{ $totalVideos ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> Total Videos</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-video"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Messages -->
    <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-secondary">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Contact Messages</h6>
                    <h3 class="stats-value">{{ $totalContactMessages ?? 0 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-check"></i> User Messages</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pages -->
    <!-- <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-primary">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Total Pages</h6>
                    <h3 class="stats-value">{{ $totalPages ?? 12 }}</h3>
                    <p class="stats-description">
                        <span class="text-muted"><i class="fas fa-file"></i> Published</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Website Status -->
    <!-- <div class="col-xl-4 col-md-6">
        <div class="stats-card stats-card-success">
            <div class="stats-card-body">
                <div class="stats-info">
                    <h6 class="stats-title">Website Status</h6>
                    <h3 class="stats-value"><i class="fas fa-check-circle"></i></h3>
                    <p class="stats-description">
                        <span class="text-success"><i class="fas fa-check"></i> Online</span>
                    </p>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-globe"></i>
                </div>
            </div>
        </div>
    </div> -->
</div>

<!-- Recent Activity & Quick Actions -->
<!-- <div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon bg-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>New user registered</strong></p>
                            <p class="activity-time text-muted">2 hours ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-success">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>New testimonial added</strong></p>
                            <p class="activity-time text-muted">5 hours ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-warning">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>New contact message received</strong></p>
                            <p class="activity-time text-muted">1 day ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-info">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>Service page updated</strong></p>
                            <p class="activity-time text-muted">2 days ago</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-danger">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text"><strong>New career application submitted</strong></p>
                            <p class="activity-time text-muted">3 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="quick-actions">
                    <a href="#" class="quick-action-btn btn btn-outline-primary w-100 mb-3">
                        <i class="fas fa-plus-circle me-2"></i> Add New Slider
                    </a>
                    <a href="#" class="quick-action-btn btn btn-outline-success w-100 mb-3">
                        <i class="fas fa-store me-2"></i> Add New Brand
                    </a>
                    <a href="#" class="quick-action-btn btn btn-outline-info w-100 mb-3">
                        <i class="fas fa-briefcase me-2"></i> Add New Service
                    </a>
                    <a href="#" class="quick-action-btn btn btn-outline-warning w-100 mb-3">
                        <i class="fas fa-envelope me-2"></i> View Messages
                    </a>
                    <a href="#" class="quick-action-btn btn btn-outline-secondary w-100">
                        <i class="fas fa-user-cog me-2"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
