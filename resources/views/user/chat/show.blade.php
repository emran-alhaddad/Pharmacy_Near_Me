@extends('layouts.masterUser3')
                    
@section('content')
<div class="w-full mb-32 h-screen">
        <div class="flex  h-full">
            
            <div class="flex-1 bg-white rounded my-16 lg:mx-16 w-full h-full" >
                <div class="main-body container m-auto w-11/12 h-full flex flex-col">
                    <div class="py-4 flex-2 flex flex-row">
                   
                       
                    </div>
    
                    <div class="main flex-1 flex flex-col overflow-auto " >
                 
                            @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender])
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection