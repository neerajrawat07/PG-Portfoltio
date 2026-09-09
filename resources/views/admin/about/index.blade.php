@extends('admin.layouts.app')

@section('title', 'Manage About Page')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manage About Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">About Page</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="aboutTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="team-tab" data-bs-toggle="tab" href="#team" role="tab" aria-controls="team" aria-selected="false">
                    <i class="fas fa-users"></i> Team ({{ $teamMembers->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">
                    <i class="fas fa-history"></i> History ({{ $history->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="values-tab" data-bs-toggle="tab" href="#values" role="tab" aria-controls="values" aria-selected="false">
                    <i class="fas fa-star"></i> Values ({{ $values->count() }})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="why-choose-tab" data-bs-toggle="tab" href="#why-choose" role="tab" aria-controls="why-choose" aria-selected="false">
                    <i class="fas fa-trophy"></i> Why Choose ({{ $whyChooses->count() }})
                </a>
            </li>
        </ul>

        <div class="tab-content" id="aboutTabContent">
            {{-- SETTINGS TAB --}}
            <div class="tab-pane fade show active" id="settings" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> General Settings</h3>
                    </div>
                    <form action="{{ route('admin.about.update-settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h5 class="mb-3">Hero Banner</h5>
                            <div class="form-group">
                                <label>Banner Image</label>
                                @if($settings->banner_image)
                                    <div class="mb-2">
                                        <img src="{{ asset($settings->banner_image) }}" alt="Current Banner" class="img-thumbnail" style="max-width: 300px;">
                                    </div>
                                @endif
                                <input type="file" name="banner_image" class="form-control-file" accept="image/*" onchange="previewBannerImage(this)">
                                <small class="form-text text-muted">Recommended size: 1920x600 pixels. Max: 5MB</small>
                                <div class="mt-2" id="bannerPreview" style="display: none;">
                                    <img id="bannerPreviewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Banner Title</label>
                                <input type="text" name="banner_title" class="form-control" value="{{ $settings->banner_title }}" placeholder="e.g., About DVACOS">
                            </div>
                            <div class="form-group">
                                <label>Banner Description</label>
                                <textarea name="banner_description" class="form-control" rows="2" placeholder="Optional banner text">{{ $settings->banner_description }}</textarea>
                            </div>

                            <hr>
                            <h5 class="mb-3">Company Overview</h5>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="company_overview_title" class="form-control" value="{{ $settings->company_overview_title }}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="company_overview_description" class="form-control" rows="3" required>{{ $settings->company_overview_description }}</textarea>
                            </div>

                            <hr>
                            <h5 class="mb-3">Mission & Vision</h5>
                            <div class="form-group">
                                <label>Mission Text</label>
                                <textarea name="mission_text" class="form-control" rows="3" required>{{ $settings->mission_text }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Vision Text</label>
                                <textarea name="vision_text" class="form-control" rows="3" required>{{ $settings->vision_text }}</textarea>
                            </div>

                            <hr>
                            <h5 class="mb-3">Section Images</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Our History Image</label>
                                        @if($settings->history_image)
                                            <div class="mb-2">
                                                <img src="{{ asset($settings->history_image) }}" alt="Current History Image" class="img-thumbnail" style="max-width: 100%; max-height: 200px;">
                                                <p class="text-muted small mt-1">Current history section image</p>
                                            </div>
                                        @endif
                                        <input type="file" name="history_image" class="form-control-file" accept="image/*">
                                        <small class="form-text text-muted">Upload image for "Our History" section (JPEG, PNG, JPG, GIF - Max 5MB)</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Our Values Image</label>
                                        @if($settings->values_image)
                                            <div class="mb-2">
                                                <img src="{{ asset($settings->values_image) }}" alt="Current Values Image" class="img-thumbnail" style="max-width: 100%; max-height: 200px;">
                                                <p class="text-muted small mt-1">Current values section image</p>
                                            </div>
                                        @endif
                                        <input type="file" name="values_image" class="form-control-file" accept="image/*">
                                        <small class="form-text text-muted">Upload image for "Our Values" section (JPEG, PNG, JPG, GIF - Max 5MB)</small>
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
            </div>

            {{-- TEAM TAB --}}
            <div class="tab-pane fade" id="team" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-users"></i> Team Members</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.about.team.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> Add Team Member
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="80">Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th width="80">Order</th>
                                    <th width="100">Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teamMembers as $member)
                                <tr>
                                    <td><img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="img-thumbnail" style="max-width: 60px;"></td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->position }}</td>
                                    <td>{{ $member->order }}</td>
                                    <td>
                                        <form action="{{ route('admin.about.team.toggle-status', $member->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $member->is_active ? 'success' : 'secondary' }}">
                                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.about.team.edit', $member->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.about.team.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team member?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center">No team members found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- HISTORY TAB --}}
            <div class="tab-pane fade" id="history" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-history"></i> Company History Timeline</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.about.history.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> Add History Item
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="100">Year</th>
                                    <th>Description</th>
                                    <th width="80">Order</th>
                                    <th width="100">Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($history as $item)
                                <tr>
                                    <td><strong>{{ $item->year }}</strong></td>
                                    <td>{{ Str::limit($item->description, 80) }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        <form action="{{ route('admin.about.history.toggle-status', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $item->is_active ? 'success' : 'secondary' }}">
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.about.history.edit', $item->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.about.history.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this history item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">No history items found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- VALUES TAB --}}
            <div class="tab-pane fade" id="values" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-star"></i> Company Values</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.about.value.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> Add Value
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th width="80">Order</th>
                                    <th width="100">Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($values as $value)
                                <tr>
                                    <td><strong>{{ $value->title }}</strong></td>
                                    <td>{{ Str::limit($value->description, 80) }}</td>
                                    <td>{{ $value->order }}</td>
                                    <td>
                                        <form action="{{ route('admin.about.value.toggle-status', $value->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $value->is_active ? 'success' : 'secondary' }}">
                                                {{ $value->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.about.value.edit', $value->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.about.value.destroy', $value->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this value?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">No values found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- WHY CHOOSE TAB --}}
            <div class="tab-pane fade" id="why-choose" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-trophy"></i> Why Choose DVACOS</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.about.why-choose.create') }}" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> Add Why Choose Item
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="80">Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th width="80">Order</th>
                                    <th width="100">Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($whyChooses as $item)
                                <tr>
                                    <td style="font-size: 2rem;">{{ $item->icon }}</td>
                                    <td><strong>{{ $item->title }}</strong></td>
                                    <td>{{ Str::limit($item->description, 60) }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        <form action="{{ route('admin.about.why-choose.toggle-status', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $item->is_active ? 'success' : 'secondary' }}">
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.about.why-choose.edit', $item->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.about.why-choose.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this Why Choose item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center">No Why Choose items found. <a href="{{ route('admin.about.why-choose.create') }}">Add your first item</a></td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function previewBannerImage(input) {
    const preview = document.getElementById('bannerPreviewImg');
    const previewDiv = document.getElementById('bannerPreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Tab persistence - Remember active tab after page reload
document.addEventListener('DOMContentLoaded', function() {
    // Get the last active tab from localStorage
    var activeTab = localStorage.getItem('aboutPageActiveTab');

    if (activeTab) {
        // Use Bootstrap 5 Tab API to activate the saved tab
        var tabTrigger = document.querySelector('[href="' + activeTab + '"]');
        if (tabTrigger) {
            var tab = new bootstrap.Tab(tabTrigger);
            tab.show();
        }
    }

    // Save active tab when clicked using Bootstrap 5 data attribute
    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function(tabEl) {
        tabEl.addEventListener('shown.bs.tab', function(e) {
            localStorage.setItem('aboutPageActiveTab', e.target.getAttribute('href'));
        });
    });

    // Save tab context when clicking Add/Edit buttons
    document.querySelectorAll('a[href*="create"], a[href*="edit"]').forEach(function(link) {
        link.addEventListener('click', function() {
            // Find which tab this button belongs to
            var activeTabPane = this.closest('.tab-pane');
            if (activeTabPane) {
                localStorage.setItem('aboutPageActiveTab', '#' + activeTabPane.id);
            }
        });
    });

    // Ensure tabs are clickable and working
    var triggerTabList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tab"]'));
    triggerTabList.forEach(function(triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl);

        triggerEl.addEventListener('click', function(event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });
});
</script>
@endsection
