@extends('admin.layouts.app')
@section('title', $title ?? 'User')
@section('content')
<div class="admin-card"><div class="card-header">{{ $title ?? 'User' }}</div><div class="card-body"><form method="POST" action="{{ $user->exists ? route('admin.users.update',$user) : route('admin.users.store') }}">@csrf @if($user->exists) @method('PUT') @endif
<div class="mb-3"><label class="form-label">Nama</label><input name="name" class="form-control" required value="{{ old('name',$user->name) }}"></div>
<div class="mb-3"><label class="form-label">Email / Username</label><input type="email" name="email" class="form-control" required value="{{ old('email',$user->email) }}"></div>
<div class="mb-3"><label class="form-label">Password {{ $user->exists ? '(kosongkan jika tidak diubah)' : '' }}</label><input type="password" name="password" class="form-control" {{ $user->exists ? '' : 'required' }} minlength="8"></div>

<button class="btn btn-accent">Simpan</button> <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a></form></div></div>
@endsection
