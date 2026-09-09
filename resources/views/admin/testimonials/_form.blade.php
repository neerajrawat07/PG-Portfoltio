<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $testimonial->name ?? '') }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Role / Company</label>
        <input type="text" name="role" class="form-control @error('role') is-invalid @enderror"
               value="{{ old('role', $testimonial->role ?? '') }}" placeholder="e.g. CEO, BrightPath Retail">
        @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
        <textarea name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Avatar Image</label>
        @if(!empty($testimonial->image))
            <div class="mb-2">
                <img src="{{ img_url($testimonial->image) }}" alt="current"
                     style="width:60px;height:60px;object-fit:cover;border-radius:50%;border:2px solid #dee2e6;">
                <small class="text-muted ms-2">Current image</small>
            </div>
        @endif
        <input type="file" name="image" accept="image/*"
               class="form-control @error('image') is-invalid @enderror"
               id="imageInput" onchange="previewImage(this)">
        <img id="imagePreview" src="" alt="" style="display:none;margin-top:8px;width:60px;height:60px;object-fit:cover;border-radius:50%;border:2px solid #dee2e6;">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-3">
        <label class="form-label fw-semibold">Rating</label>
        <select name="rating" class="form-select">
            @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                </option>
            @endfor
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label fw-semibold">Sort Order</label>
        <input type="number" name="sort_order" class="form-control"
               value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" min="0">
    </div>

    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" id="isActive" value="1"
                   {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="isActive">Show on website</label>
        </div>
    </div>
</div>

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
