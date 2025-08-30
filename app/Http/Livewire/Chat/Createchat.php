<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Createchat extends Component
{
    public $users;
    public $auth_email;

    public function mount()
    {
        $this->auth_email = auth()->user()->email;
    }

    public function createConversation($receiver_email)
    {

        $existingConversation = Conversation::checkConversation($this->auth_email, $receiver_email)->first();
                if (!$existingConversation) {
            DB::beginTransaction();
            try {
                $createConversation = Conversation::create([
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'last_time_message' => null,
                ]);
                Message::create([
                    'conversation_id' => $createConversation->id,
                    'sender_email' => $this->auth_email,
                    'receiver_email' => $receiver_email,
                    'body' => 'السلام عليكم',
                ]);
                DB::commit();
                // Livewire v2: trigger re-render via $refresh
                $this->emitSelf('$refresh');
            } catch (\Exception $e) {
                DB::rollBack();
            }
        } else {

            // Conversation exists – redirect user back to the chat screen
            session()->flash('message', 'المحادثة مفتوحة مسبقًا');
            return redirect()->route(Auth::guard('patient')->check() ? 'chat.doctors' : 'chat.patients');
        }
    }

    public function render()
    {
        if (Auth::guard('patient')->check()) {
            $this->users = Doctor::all();
        } else {
            $this->users = Patient::all();
        }
        // Use Livewire's layout chaining to render within the dashboard layout
        return view('livewire.chat.createchat')
            ->extends('Dashboard.layouts.master')
            ->section('content');
    }
}
