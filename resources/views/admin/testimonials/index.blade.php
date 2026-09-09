@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0"><i class="fas fa-quote-left me-2"></i>Testimonials</h4>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add Testimonial
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width:60px">#</th>
                    <th style="width:70px">Image</th>
                    <th>Name / Role</th>
                    <th>Message</th>
                    <th>Rating</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="width:130px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>
                        @if($t->image)
                            <img src="{{ img_url($t->image) }}" alt="{{ $t->name }}"
                                 style="width:50px;height:50px;object-fit:cover;border-radius:50%;">
                        @else
                            <div style="width:50px;height:50px;border-radius:50%;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $t->name }}</strong><br>
                        <small class="text-muted">{{ $t->role }}</small>
                    </td>
                    <td style="max-width:280px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        {{ $t->message }}
                    </td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $t->rating ? 'text-warning' : 'text-secondary' }}" style="font-size:.75rem;"></i>
                        @endfor
                    </td>
                    <td>{{ $t->sort_order }}</td>
                    <td>
                        <span class="badge {{ $t->is_active ? 'bg-success' : 'bg-secondary' }}">
                            {{ $t->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this testimonial?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">No testimonials yet. <a href="{{ route('admin.testimonials.create') }}">Add one.</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
