<div>
    <div class="{{ $owned ? 'bg-green-400 dark:bg-green-600' : 'bg-red-400 dark:bg-red-500' }}">
        <div class="relative flex items-center justify-between mr-2 ml-2 h-8">
            <div class="text">
                <label for="incendiary" class="font-medium text-gray-700">Incendiary</label>
            </div>
            <div class="">
                <input wire:click="toggle"
                       id="incendiary"
                       aria-describedby="incendiary-description"
                       name="recipe"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                        {{ $owned ? 'checked' : ''  }}
                >
            </div>
        </div>
    </div>
</div>
