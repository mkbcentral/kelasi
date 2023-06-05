<div>
    <div>
        @if (session()->has('message'))
            <div class="bg-green-600 p-3 mx-2 flex text-white rounded-md">
                <x-heroicon-o-check aria-hidden="true" class="w-5 h-5" />
                {{ session('message') }}
            </div>
        @endif
        <form wire:submit.prevent='saveNewInscription' class="p-3">
            <div class="grid grid-cols-3 gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Full name')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input withicon id="name" class="block w-full" type="text"
                            wire:model.defer='name' :value="old('name')" placeholder="{{ __('name') }}" autofocus />
                    </x-form.input-with-icon-wrapper>
                    @error('name')
                        <span class="text-red-500 mt-2 p-4">{{ $message }}</span>
                    @enderror
                </div>
                <!-- date_of_birth -->
                <div class="space-y-2">
                    <x-form.label for="date_of_birth" :value="__('Date of birth')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-calendar aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input withicon id="date_of_birth" class="block w-full" type="date"
                            wire:model.defer="date_of_birth" placeholder="{{ __('Date of birth') }}" />
                    </x-form.input-with-icon-wrapper>
                    @error('date_of_birth')
                        <span class="text-red-500 mt-2 pl-4">{{ $message }}</span>
                    @enderror
                </div>
                <!-- gender -->
                <div class="space-y-2">
                    <x-form.label for="gender" :value="__('gender')" />
                    <x-form.input-select class="flex " wire:model.defer="gender">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose gender</option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                    @error('gender')
                        <span class="text-red-500 mt-2 pl-4">{{ $message }}</span>
                    @enderror
                </div>
                <!-- gender -->

            </div>
            <div class="grid grid-cols-3 gap-6 mt-4">
                <!-- classe -->
                <div class="space-y-2">
                    <x-form.label for="classe_id" :value="__('Classe')" />
                    <x-form.input-select class="" id="classe_id" wire:model.defer='classe_id'>
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose classe</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                            @endforeach
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                    @error('classe_id')
                        <span class="text-red-500 mt-2 pl-4">{{ $message }}</span>
                    @enderror
                </div>
                <!-- classe -->
                <!-- cost_inscription_id -->
                <div class="space-y-2">
                    <x-form.label for="cost_inscription_id" :value="__('Type cost')" />
                    <x-form.input-select class=" " id="cost_inscription_id" wire:model.defer="cost_inscription_id">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose cost inscription_id</option>
                            @foreach ($costs as $cost)
                                <option value="{{ $cost->id }}">{{ $cost->name }}</option>
                            @endforeach
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                    @error('cost_inscription_id')
                        <span class="text-red-500 mt-2 pl-4">{{ $message }}</span>
                    @enderror
                </div>
                <!-- gender -->

            </div>
            <div class="flex justify-end mt-4 ml-4">
                <x-button class="justify-center  gap-2">
                    <x-heroicon-o-pencil-alt class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Create') }}</span>
                </x-button>
            </div>
        </form>
    </div>
</div>
