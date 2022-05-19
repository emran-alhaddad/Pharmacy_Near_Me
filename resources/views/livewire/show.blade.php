<div>
    {{-- In work, do what you enjoy. --}}
</div>

<div class="flex-1 flex flex-row-reverse h-full overflow-auto">
        @if(auth()->user()->is_active == true)
        <div class="sidebar hidden lg:flex w-1/3 flex-2 flex-col pr-6 overflow-auto ">
                                <div class="search flex-2 pb-6 px-2 " >
                                    <input type="text" class="outline-none py-2 block w-full bg-transparent border-b-2 border-gray-200" placeholder="Search">
                                </div>

                                <div class="flex-1 h-full my-8   overflow-auto px-2  scrollbar" id="style-7">
                                    @foreach($users as $user)
                                    @php
                                        $not_seen = \App\Models\Messages::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                    @endphp
                                    <a href="{{ route('inbox.show', $user->id) }}" > 
                                        <div class="entry  cursor-pointer transform hover:scale-105 duration-300 transition-transform bg-white mb-4 rounded p-4 flex shadow-md"  wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                                <div class="flex-2">
                                                    <div class="w-12 h-12 relative">
                                                        <img class="w-12 h-12 rounded-full mx-auto" src="/images/1651959757_edait.png" alt="chat-user" />
                                                        <span class="absolute w-4 h-4 bg-green-400 rounded-full right-0 bottom-0 border-2 border-white"></span>
                                                    </div>
                                                </div>

                                                <div class="flex-1 px-2">
                                                @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif 
                                                    <div class="truncate w-32"><span class="text-gray-800">{{ $user->name }}</span></div>
                                                    <div><small class="text-gray-600">{{ $user->last_activity }}</small></div>
                                                    @if(filled($not_seen))
                                                        <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                                    @endif
                                                </div>
                                                <!-- <div class="flex-2 text-right">
                                                    <div><small class="text-gray-500">15 April</small></div>
                                                    <div>
                                                        <small class="text-xs bg-red-500 text-white rounded-full h-6 w-6 leading-6 text-center inline-block">
                                                            23
                                                        </small>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
        </div>
        @endif
        <div class="chat-area flex-1 flex flex-col  overflow-auto ">
                                <div class="flex-3" >
                                    <h2 class="text-xl py-1 mb-8 border-b-2 border-gray-200" styly="text-align: center;">  <b>  {{ $sender->name }}</b></h2>
                                </div>
                                <div class="messages flex-1  flex flex-col flex-col-reverse overflow-auto  scrollbar" id="style-7" dir="ltr" wire:poll.10ms="mountComponent()">
                                    @if(filled($messages))
                                        @foreach($messages as $message)
                                            <div class="message  mb-4 flex  @if($message->user_id !== auth()->id()) received @else sent @endif">
                                                @if($message->user_id == auth()->id())
                                                
                                                    <div class="flex-1  px-2 text-right">
                                                        <div class="inline-block bg-primary-blue text-primary-light-gray rounded-full p-2 px-6 text-gray-700">
                                                            <span>{{ $message->message }}</span>
                                                        </div>
                                                        @if (isPhoto($message->file))
                                                            <div class="w-100 my-2 ">
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
                                                        <div class="pl-4 "><small class="text-gray-500">{{ $message->created_at }}</small></div>
                                                    </div>
                                                @else
                                            
                                                    <div class="flex-1  px-2">
                                                        <div class="inline-block bg-primary-light-gray rounded-full p-2 px-6 text-gray-700">
                                                            <span>{{ $message->message }}</span>
                                                        </div>
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
                                                        <div class="pl-4"><small class="text-gray-500">{{ $message->created_at }}</small></div>
                                                    </div>
                                                @endif
                                            </div>
                                    
                                            <!-- <div class="message me mb-4 flex text-right">
                                                <div class="flex-1 px-2">
                                                    <div class="inline-block bg-gray rounded-full p-2 px-6 text-white">
                                                        <span>It's like a dream come true</span>
                                                    </div>
                                                    <div class="pr-4"><small class="text-gray-500">15 April</small></div>
                                                </div>
                                            </div> -->
                                        @endforeach
                                    @else
                                        لا يوجد رسائل لعرضها -_-
                                    @endif 
                                </div>
                                <div class="flex-2 pt-4 pb-10" >
                                    <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                                        <div wire:loading wire:target='SendMessage'>
                                            Sending message . . . 
                                        </div>
                                        <div wire:loading wire:target="file">
                                            Uploading file . . .
                                        </div>
                                        @if($file)
                                                <div class="mb-2">
                                               لقد تم التحميل  <button type="button" wire:click="resetFile" class="btn bg-primary-light-pink text-right btn-sm"> حذف {{ $file->getClientOriginalName() }}<i class="fa fa-times"></i></button>
                                                </div>
                                 
                                        @endif

                                        <div class="write bg-white shadow flex rounded-lg">
                                            <div class="flex-3 flex content-center items-center text-center p-4 pr-0">
                                                <span class="block text-center text-gray-400 hover:text-gray-800">
                                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="h-6 w-6"><path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <textarea name="message"  wire:model="message"  class="w-full block outline-none py-4 px-4 bg-transparent" rows="1" placeholder="Type a message..." autofocus @if(!$file) required @endif></textarea>
                                            </div>
                                            <div class="flex-2 w-32 p-2 flex content-center items-center">
                                            @if(empty($file))
                                                <div class="flex-1 text-center">
                                          
                                                    <label class="w-4 flex flex-col items-center px-4 py-6  rounded-md  tracking-wide  cursor-pointer  ease-linear transition-all ">
                                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="w-6 h-6"><path d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                                    <input type='file' class="hidden"  type="file" wire:model="file"/>
                                                    </label> 
                                              
                                                </div>


                                                @endif
                                                <div class="flex-1">
                                                    <button class="bg-blue-400 w-10 h-10 rounded-full inline-block">
                                                        <span class="inline-block align-text-bottom">
                                                             <i class="fas fa-paper-plane "></i>send
                                                        </span>
                                                    </button>
                                                </div>
                                         
                                         
                                            </div>
                                        </div>
                                    </form>
                                </div>
        </div>
    </div>

