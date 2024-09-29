<div>
  <div class="mb-4">
    <input
      wire:model.live.debounce="search"
      type="text"
      placeholder="Search users..."
      class="focus:ring-blue-500 w-full rounded-lg border px-4 py-2 focus:outline-none focus:ring-2"
    />
  </div>

  <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-2">
    <div>
      <h2 class="text-lg font-bold">Database Search Results</h2>
      @forelse($usersFromDb as $user)
      <div
        class="transform rounded-lg bg-white p-4 shadow transition duration-300 ease-in-out hover:scale-105"
      >
        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
        <p class="text-gray-600">{{ $user->email }}</p>
      </div>
      @empty
      <div class="rounded-lg bg-white p-4 text-center shadow">No users found in Database Search.</div>
      @endforelse
      <p>Search Time (DB): {{ number_format($dbSearchTime, 5) }} seconds</p>
    </div>

    <div>
      <h2 class="text-lg font-bold">MeiliSearch Results</h2>
      @forelse($usersFromMeiliSearch as $user)
      <div
        class="transform rounded-lg bg-white p-4 shadow transition duration-300 ease-in-out hover:scale-105"
      >
        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
        <p class="text-gray-600">{{ $user->email }}</p>
      </div>
      @empty
      <div class="rounded-lg bg-white p-4 text-center shadow">No users found in MeiliSearch.</div>
      @endforelse
      <p>Search Time (MeiliSearch): {{ number_format($meiliSearchTime, 5) }} seconds</p>
    </div>
  </div>
</div>
