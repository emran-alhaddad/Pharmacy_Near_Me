
@extends('layouts.masterUser')

@section('content')
<div class="container">
    @livewire('message', ['users' => $users, 'messages' => $messages ?? null])
</div>
@endsection
