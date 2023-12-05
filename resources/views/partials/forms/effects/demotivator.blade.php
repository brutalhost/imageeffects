<x-form-text name="header" :value="old('header', $params['header'] ?? '')">
    Header
</x-form-text>

<x-form-text name="subtitle" :value="old('subtitle', $params['subtitle'] ?? '')" min="0" max="255">
    Subtitle
</x-form-text>

<x-form-slider name="header_size" :value="old('header_size', $params['header_size'])" min="1" max="100">
Header Size
</x-form-slider>

<x-form-slider name="subtitle_size" :value="old('subtitle_size', $params['subtitle_size'])" min="1" max="100">
    Subtitle Size
</x-form-slider>
