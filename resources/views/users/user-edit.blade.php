<form method="POST" action="{{ route('users.update',$user->id) }}">
    @csrf
    @method('put')
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div>
                <label for="name">Name</label>
                <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                @error('name')
                <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-4">
        <label for="email">E-mail</label>
        <input name="email" value="{{ $user->email }}" type="text" class="form-control">
        @error('image')
        <span class="text-danger fs-6">{{ $message }}</span>
        @enderror
    </div>
    <div class="px-2 mt-4">
        <button class="btn btn-dark btn-sm mb-3">Save</button>
    </div>
</form>
