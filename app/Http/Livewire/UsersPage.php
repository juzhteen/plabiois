<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class UsersPage extends Component
{
    public $openApprove, $openDelete = false;
    public $user_id;

    public function render()
    {
        // Get all users

        $users = User::where('admin_type', 'admin')->get();
        
        return view('livewire.users.users-page', ['users' => $users]);
    }

    public function openDeleteModal()
    {
        $this->openDelete = true;
    }

    public function openDelete($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->openDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->clear();
        $this->openDelete = false;
    }

    public function delete()
    {
        User::findOrFail($this->user_id)->delete();
        $this->dispatchBrowserEvent("user_deleted");
        $this->clear();
        $this->closeDeleteModal();
    }

    public function openApproveModal()
    {
        $this->openApprove = true;
    }

    public function openApprove($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->openApproveModal();
    }

    public function closeApproveModal()
    {
        $this->clear();
        $this->openApprove = false;
    }

    public function approve()
    {
        $user = User::where('id', $this->user_id)->first();
        $user->approved = 1;
        $user->save();
        
        $this->dispatchBrowserEvent("user_approved");
        $this->clear();
        $this->closeApproveModal();
    }

    public function clear()
    {
        $this->user_id = null;
    }
}
