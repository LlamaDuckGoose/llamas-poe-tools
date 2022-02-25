<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Necromancer extends Component
{
    public bool $owned = false;
    public bool $childOwned = false;

    public string $name = 'necromancer';
    public string $parent = '';

    public array $childRecipes = [];

    protected function getListeners(): array
    {
        return ["{$this->parent}Recipe" => 'updateChild'];
    }

    public function mount()
    {
        $this->parent = $this->parent . $this->name;
        $this->owned = Storage::disk('local')->get($this->name) ?? false;

        $this->updateParent();
        $this->setChildrenRecipes();
    }

    public function updateChild($params)
    {
        $this->childRecipes = array_merge($this->childRecipes, $params);
        $this->updateChildOwned();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned -= 1);

        Storage::disk('local')->put($this->name, $this->owned);
        $this->updateParent();
    }

    private function updateParent()
    {
        $this->emitUp("{$this->parent}Recipe", [$this->name => $this->owned]);
    }

    private function setChildrenRecipes()
    {
        $this->childRecipes = [
            'bombardier' => Storage::disk('local')->get("{$this->parent}_bombardier") ?? false,
            'overcharged' => Storage::disk('local')->get("{$this->parent}_overcharged") ?? false,
        ];

        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    private function updateChildOwned()
    {
        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    public function render()
    {
        return view('livewire.archnemesis.necromancer');
    }
}