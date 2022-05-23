@extends('layouts.masterUser')

@section('content')
    <div class="container-fluid">
        <div class="container">
            @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender])
        </div>
    </div>
@endsection
