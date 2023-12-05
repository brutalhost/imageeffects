<form id="image-loader" action="{{ route('ajax.image-uploader') }}" method="POST" enctype='multipart/form-data'
      novalidate>
    @csrf
    <div class="mb-3 form-group">
        <label for="inputImage" class="form-label">Image</label>
        <input type="hidden" name="effect" value="{{ $effect->route_name }}">
        <input type="file" name="inputImage" class="form-control" id="inputImage" required
               value="{{ old('inputImage', null) }}">
        @error('inputImage')
        <span>
            {{ $message }}
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
