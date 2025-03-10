<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Masmerise\Toaster\Toastable;

class ChangePassword extends Component
{
    use Toastable;

    public $current_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ];

    public function render()
    {
        return view('livewire.change-password')->layout('layouts.app');
    }

    public function updatePassword()
    {
        $this->validate();

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($this->current_password, $user->password)) {
            $this->error('Current password is incorrect.');
            return;
        }

        // Update the password
        $user->password = Hash::make($this->password);
        $user->save();

        $this->reset(['current_password', 'password', 'password_confirmation']);
        $this->success('Password updated successfully.');
    }
} 