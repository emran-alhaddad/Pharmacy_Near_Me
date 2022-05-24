<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\Messages;

class Message extends Component
{
    use WithFileUploads;

    public $message = '';
    public $users;
    public $clicked_user;
    public $messages;
    public $file;
    public $admin;

    public function render()
    {

        return view('livewire.message', [
            'users' => $this->users,
            'admin' => $this->admin
        ]);
    }

    public function mount()
    {
        $this->mountComponent();
    }

    public function mountComponent() {
        if (auth()->user()->is_active == false) {
            $this->messages = \App\Models\Messages::where('user_id', auth()->id())
                                                    ->orWhere('receiver', auth()->id())
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
        } else {
            $this->messages = \App\Models\Messages::where('user_id', $this->clicked_user)
                                                    ->orWhere('receiver', $this->clicked_user)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
        }
        $this->admin = \App\Models\User::where('is_active', true)->first();
    }

    public function SendMessage() {
        $new_message = new \App\Models\Messages();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        if (!auth()->user()->is_active == true) {
            $admin = User::where('is_active', true)->first();
            $this->user_id = $admin->id;
        } else {
            $this->user_id = $this->clicked_user->id;
        }
        $new_message->receiver = $this->user_id;

        // Deal with the file if uploaded
        if ($this->file) {
            $file = $this->file->store('public/files');
            $path = url(Storage::url($file));
            $new_message->file = $path;
            $new_message->file_name = $this->file->getClientOriginalName();
        }
        $new_message->save();

        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }

    public function getUser($user_id) 
    {
        $this->clicked_user = User::find($user_id);
        $this->messages = \App\Models\Messages::where('user_id', $user_id)->get();
    }

    public function resetFile() 
    {
        $this->reset('file');
    }

}