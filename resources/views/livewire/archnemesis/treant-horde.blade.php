<div>
    <div class="divide-y divide-gray-200 w-36 {{ $owned ? 'bg-green-400 dark:bg-green-600' : 'bg-red-400 dark:bg-red-600' }}">
        <div class="relative flex items-center justify-between mr-2 ml-2 h-8">
            <div class="text">
                <label for="sentinel" class="font-medium text-gray-700">Sentinel</label>
            </div>
            <div class="">
                <input wire:click="toggle"
                       id="sentinel"
                       aria-describedby="sentinel-description"
                       name="recipe"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        {{ $owned ? 'checked' : ''  }}
                >
            </div>
        </div>
    </div>
    @livewire('archnemesis.toxic', ['parent' => $parent])
    @livewire('archnemesis.steel-infused', ['parent' => $parent])
    @livewire('archnemesis.sentinel', ['parent' => $parent])
</div>