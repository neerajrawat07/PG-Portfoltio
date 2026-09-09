@include('Admin.layouts.header')
@include('Admin.layouts.sidebar')

{{-- Global Alert Messages --}}

    {{-- Success Message --}}
   

    {{-- Validation Errors --}}
    <!-- @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->


@yield('main-container')

@include('Admin.layouts.footer')
