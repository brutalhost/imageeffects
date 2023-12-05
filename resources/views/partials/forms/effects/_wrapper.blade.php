<form id="effect-params-form" action="{{ route('effects.show', $effect) }}" method="POST"
      hx-post="{{ route('ajax.process-image', $effect) }}"
      hx-swap="outerHTML"
      hx-trigger="change from:(#effect-params-form .form-range) delay:750ms, keyup from:(#effect-params-form .form-control) delay:750ms, click from:#effect-params-form__submit"
      hx-disinherit="*"
>
    @csrf
    <div id="effect-params-form__inputs">
        @include('partials.forms.effects.'.$effect->route_name)
    </div>

    <div id="ajax-error" class="text-danger mb-2" role="alert">
    </div>

    <button id="effect-params-form__submit" class="btn btn-primary" type="submit">Submit</button>
</form>
