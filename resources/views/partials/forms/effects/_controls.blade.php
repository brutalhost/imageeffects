<form action="{{ route('ajax.downlaod-image', ['effect' => $effect]) }}" method="POST" class="d-inline"
      hx-boost="false">
    @csrf
    <button class="btn btn-success" type="submit">Download</button>
</form>
<a class="btn btn-primary" href="{{ url()->current() }}">Reset</a>
<form class="d-inline" action="{{ route('ajax.delete-image') }}" method="POST"
      hx-confirm="Are you sure you wish to delete image from server?">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete Image</button>
</form>
