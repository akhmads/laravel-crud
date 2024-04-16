<x-bs-layout>

<div class="container">

    <div class="my-5 d-flex justify-content-between">
        <div>
            <h1>Laravel 11 CRUD</h1>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('demo.users.create') }}" class="btn btn-primary">Create new user</a>
        </div>
    </div>

    @session('success')
    <div class="alert alert-success alert-dismissible" role="alert">
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endsession

    <table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <div class="d-flex gap-2 justify-content-center">
                <a href="{{ route('demo.users.edit', $user->id) }}" class="btn btn-sm btn-primary py-0">edit</a>
                <form action="{{ route('demo.users.destroy', $user->id) }}" method="post" class="d-flex p-0 m-0" onsubmit="return confirm('Do you really want to delete this user?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger py-0">delete</button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">No data found.</td>
    </tr>
    @endforelse
    </tbody>
    </table>

    {!! $users->links() !!}
</div>

</x-bs-layout>
