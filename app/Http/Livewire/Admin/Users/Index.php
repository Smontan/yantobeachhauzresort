<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginateTheme = 'bootstrap';

    public $user_id;

    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function destroyUser()
    {

        $user = User::findOrFail($this->user_id);

        // session()->flash('message', 'User ' . $user->name . ' deleted successfully!');
        flash()
            ->option('timeout', 3000)
            ->addSuccess('User '.$user->name.' is deleted successfully!');

        $user->delete();
    }

    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.users.index', ['users' => $users]);
    }
}