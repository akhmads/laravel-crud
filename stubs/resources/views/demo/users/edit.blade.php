<x-bootstrap-layout>

<div class="container">
    <div class="w-50 mx-auto">

        <h1 class="my-5">Edit User</h1>

        <form action="{{ route('demo.users.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-lg" placeholder="">
                @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-lg" placeholder="">
                @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" placeholder="">
                <div class="form-text text-secondary">leave blank if you don't want to change the password</div>
                @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('demo.users.index') }}" class="btn btn-lg btn-light">Back</a>
                <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>

        </form>

    </div>
</div>

</x-bootstrap-layout>
