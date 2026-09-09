# Admin Assets Directory

This directory contains assets for the Derma Admin Panel.

## Directory Structure

```
Admin/
├── css/          # CSS files (using CDN)
├── js/           # JavaScript files (using CDN)
└── img/          # Images
    └── default-avatar.svg    # Default user avatar
```

## Assets Loading

The admin panel uses **AdminLTE v4** framework with the following setup:

### CSS (Loaded via CDN)
- AdminLTE CSS: `https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css`
- Bootstrap Icons: `https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css`
- OverlayScrollbars: `https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css`
- Source Sans 3 Font: `https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css`

### JavaScript (Loaded via CDN)
- AdminLTE JS: `https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js`
- Bootstrap 5: `https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js`
- Popper.js: `https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js`
- OverlayScrollbars: `https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js`
- ApexCharts: `https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js`
- SortableJS: `https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js`

### Local Assets
- Default Avatar: `/Admin/img/default-avatar.svg`
- Profile Images: `/uploads/profiles/` (user uploaded images)

## Benefits of CDN Loading

✅ Faster loading times
✅ Reduced server bandwidth
✅ Automatic browser caching
✅ No need to maintain large asset files locally
✅ Always up-to-date with latest stable versions

## Custom Assets

If you need to add custom CSS or JS files:
1. Place them in the respective directories (css/ or js/)
2. Reference them in the header or footer blade files using:
   ```blade
   <link rel="stylesheet" href="{{ asset('Admin/css/custom.css') }}">
   <script src="{{ asset('Admin/js/custom.js') }}"></script>
   ```
