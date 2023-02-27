@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Permissions</h1>
        <hr>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Create New Permission</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this permission?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection