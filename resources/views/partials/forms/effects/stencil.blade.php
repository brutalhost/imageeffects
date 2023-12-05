<div class="alert alert-dismissible alert-info">
    Filtering the number of iterations concerns processing an indexed quantity of colors.
</div>

<x-form-slider name="number_colors" :value="old('number_colors', $params['number_colors'])" min="0" max="36">
    Number Colors
</x-form-slider>

<x-form-slider name="max_iterations" :value="old('max_iterations', $params['max_iterations'])" min="1" max="24">
    Max Iterations
</x-form-slider>

<x-form-slider name="treshold" :value="old('treshold', $params['treshold'])" min="0" max="100">
    Treshold
</x-form-slider>
