<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;
    public $dbSearchTime;
    public $meiliSearchTime;

    protected $queryString = ['search'];

    public function render()
    {
        $startDb = microtime(true);

        $usersFromDb = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();

        $this->dbSearchTime = microtime(true) - $startDb;

        $startMeili = microtime(true);

        $usersFromMeiliSearch = User::search($this->search)->get();

        $this->meiliSearchTime = microtime(true) - $startMeili;

        return view('livewire.search-users', [
            'usersFromDb' => $usersFromDb,
            'usersFromMeiliSearch' => $usersFromMeiliSearch,
            'dbSearchTime' => $this->dbSearchTime,
            'meiliSearchTime' => $this->meiliSearchTime
        ]);
    }
}
