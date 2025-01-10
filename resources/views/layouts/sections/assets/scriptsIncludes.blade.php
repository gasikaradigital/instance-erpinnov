@php
use Illuminate\Support\Facades\Vite;
$menuCollapsed = ($configData['menuCollapsed'] === 'layout-menu-collapsed') ? json_encode(true) : false;
@endphp
<!-- laravel style -->
@vite([
'resources/assets/vendor/js/helpers.js',
'resources/assets/js/config.js'
])

@if ($configData['hasCustomizer'])
<script type="module">
  window.templateCustomizer = new TemplateCustomizer({
    cssPath: '',
    themesPath: '',
    defaultStyle: "{{$configData['styleOpt']}}",
    defaultShowDropdownOnHover: "{{$configData['showDropdownOnHover']}}", // true/false (for horizontal layout only)
    displayCustomizer: "{{$configData['displayCustomizer']}}",
    lang: '{{ app()->getLocale() }}',
    pathResolver: function(path) {
      var resolvedPaths = {
        // Core stylesheets
        @foreach (['core'] as $name)
          '{{ $name }}.scss': '{{ Vite::asset('resources/assets/vendor/scss'.$configData["rtlSupport"].'/'.$name.'.scss') }}',
          '{{ $name }}-dark.scss': '{{ Vite::asset('resources/assets/vendor/scss'.$configData["rtlSupport"].'/'.$name.'-dark.scss') }}',
        @endforeach

        // Themes
        @foreach (['default', 'bordered', 'semi-dark'] as $name)
          'theme-{{ $name }}.scss': '{{ Vite::asset('resources/assets/vendor/scss'.$configData["rtlSupport"].'/theme-'.$name.'.scss') }}',
          'theme-{{ $name }}-dark.scss': '{{ Vite::asset('resources/assets/vendor/scss'.$configData["rtlSupport"].'/theme-'.$name.'-dark.scss') }}',
        @endforeach
      }
      return resolvedPaths[path] || path;
    },
    'controls': <?php echo json_encode($configData['customizerControls']); ?>,
  });
</script>
@endif
