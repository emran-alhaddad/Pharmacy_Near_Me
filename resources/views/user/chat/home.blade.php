 @extends('layouts.masterUser3')

@section('content')
    <div class="w-full mb-32 h-screen">
        <div class="flex  h-full ">
            
            <div class="flex-1 bg-white rounded my-16 mx-32 w-full h-full " >
                <div class="main-body container m-auto w-11/12 h-full flex flex-col">
                    <div class="py-4 flex-2 flex flex-row">
                   
                       
                    </div>
    
                    <div class="main flex-1 flex flex-col overflow-auto " >

                        @livewire('message', ['users' => $users, 'messages' => $messages ?? null])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection