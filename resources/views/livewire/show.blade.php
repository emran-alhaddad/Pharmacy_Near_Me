

<?php

if (!function_exists('isPhoto')) 
{
    function isPhoto($path) 
    {
        // Get the file extension from the path
        $exploded = explode('.', $path);
        $ext = strtolower(end($exploded));
        // Define the photos extensions
        $photoExtensions = ['png', 'jpg', 'jpeg', 'gif', 'jfif', 'tif', 'webp'];
        // Check if this extension belongs to the extensions we defined
        if (in_array($ext, $photoExtensions)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isVideo')) 
{
    function isVideo($path) 
    {
        // Get the file extension from the path
        $exploded = explode('.', $path);
        $ext = end($exploded);
        // Define the videos extensions
        $videoExtensions = ['mov', 'mp4', 'avi', 'wmf', 'flv', 'webm'];
        // Check if this extension belongs to the extensions we defined
        if (in_array($ext, $videoExtensions)) {
            return true;
        }
        return false;
    }
}
?>



<div>
    <div class="row justify-content-center m-5">
        @if(auth()->user()->is_active == true)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        المستخدمين
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($users as $user)
                                @php
                                    $not_seen = \App\Models\Message::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                @endphp
                                <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                    <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                        <img class="img-fluid avatar" src="http://127.0.0.1:8000/uploads/avaters/client/avater.png">
                                        @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif {{ $user->name }}
                                        @if(filled($not_seen))
                                            <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $sender->name }}
                </div>
                <div class="card-body message-box" wire:poll.10ms="mountComponent()">
                    @if(filled($messages))
                        @foreach($messages as $message)
                            <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                <p class="my-0">{{ $message->message }}</p>
                                @if (isPhoto($message->file))
                                    <div class="w-100 my-2">
                                        <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{ $message->file }}">
                                    </div>
                                @elseif (isVideo($message->file))
                                    <div class="w-100 my-2">
                                        <video style="height: 250px" class="img-fluid rounded" controls>
                                            <source src="{{ $message->file }}">
                                        </video>
                                    </div>
                                @elseif ($message->file)
                                    <div class="w-100 my-2">
                                        <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank" download><i class="fa fa-download"></i> 
                                            {{ $message->file_name }}
                                        </a>
                                    </div>
                                @endif
                                <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                            </div>
                        @endforeach
                    @else
                        No messages to show
                    @endif
                </div>
                <div class="card-footer">
                    <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                        <div wire:loading wire:target='SendMessage'>
                           ارسال الرساله. . . 
                        </div>
                        <div wire:loading wire:target="file">
                           تحميل الملف . . .
                        </div>
                        @if($file)
                                <div class="mb-2">
                                   You have an uploaded file <button type="button" wire:click="resetFile" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove {{ $file->getClientOriginalName() }}</button>
                                </div>
                            @else
                               لا يوجد ملفات محملة
                            @endif
                        <div class="row">
                            <div class="col-md-7">
                                <input wire:model="messages" class="form-control input shadow-none w-100 d-inline-block" placeholder="اكتب هنا" @if(!$file) required @endif>
                            </div>
                            @if(empty($file))
                                <div class="col-md-1">
                                    <button type="button" class=" btn btn-outline-secondary" id="file-area">
                                        <label>
                                            <i class="fa fa-file-upload"></i>
                                            <input type="file" wire:model="file" style="border:none;">
                                        </label>
                                    </button>
                                </div>
                                @endif
                            <div class="col-md-4">
                                <button class="btn btn-submit btn-hover  me-2 w-100"><i class="far fa-paper-plane"></i> ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
