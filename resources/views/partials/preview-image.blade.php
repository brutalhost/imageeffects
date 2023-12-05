<img id="preview-img" src="{{ app('session-helper')->image->getUrl() }}{{ $errors->any() ? '' : '?lastmod='.time() }}" alt="image"
     class="img-responsive object-fit-contain">
