@extends('admin.layouts.app')
@section('title','User')
@section('content')
<div class="admin-card"><div class="card-header d-flex justify-content-between align-items-center"><span>Daftar User</span><a href="{{ route('admin.users.create') }}" class="btn btn-accent btn-sm">Tambah User</a></div><div class="card-body">
<form class="mb-3"><div class="input-group"><input name="search" value="{{ $search }}" class="form-control" placeholder="Cari nama atau email..."><button class="btn btn-outline-secondary">Cari</button></div></form>
<div class="table-responsive"><table class="table align-middle"><thead><tr><th>Nama</th><th>Email</th><th>Role</th><th class="text-end">Aksi</th></tr></thead><tbody>@forelse($users as $user)<tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td><span class="badge text-bg-light">{{ ucfirst($user->role ?? 'user') }}</span></td><td class="text-end"><a href="{{ route('admin.users.edit',$user) }}" class="btn btn-sm btn-outline-primary">Edit</a> <form class="d-inline" method="POST" action="{{ route('admin.users.destroy',$user) }}" data-confirm="Hapus user ini?">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="4" class="text-center text-muted">Belum ada user.</td></tr>@endforelse</tbody></table></div>{{ $users->links() }}</div></div>
@endsection
