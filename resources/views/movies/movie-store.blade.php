<form action="{{ route('store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <input type="text" name="title" id="title" class="form-control" />
        @error('title')
        <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <input type="text" name="date" id="date" class="form-control" />
        @error('date')
        <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <input type="text" name="genre" id="genre" class="form-control" />
        @error('genre')
        <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
</form>
