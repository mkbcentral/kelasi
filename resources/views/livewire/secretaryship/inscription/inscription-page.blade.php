<div>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('New Inscription') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="justify-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div>
        <form method="POST" action="{{ route('login') }}" class="p-3">
            @csrf
            <div class="grid grid-cols-3 gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Full name')" />
                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-form.input withicon id="name" class="block w-full" type="text" name="name"
                            :value="old('name')" placeholder="{{ __('name') }}" required autofocus />
                    </x-form.input-with-icon-wrapper>
                </div>
                <!-- date_of_birth -->
                <div class="space-y-2">
                    <x-form.label for="date_of_birth" :value="__('Date of birth')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-calendar aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="date_of_birth" class="block w-full" type="date"
                            name="date_of_birth" required autocomplete="current-date_of_birth"
                            placeholder="{{ __('date_of_birth') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>
                <!-- gender -->
                <div class="space-y-2">
                    <x-form.label for="gender" :value="__('gender')" />
                    <x-form.input-select class="flex ">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose gender</option>
                            <option value="M">Masculin</option>
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                </div>
                <!-- gender -->

            </div>
            <div class="grid grid-cols-3 gap-6 mt-4">
                <!-- gender -->
                <div class="space-y-2">
                    <x-form.label for="gender" :value="__('gender')" />
                    <x-form.input-select class="" id="gender">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose gender</option>
                            <option value="M">Masculin</option>
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                </div>
                <!-- gender -->

                <!-- classe -->
                <div class="space-y-2">
                    <x-form.label for="classe_id" :value="__('Classe')" />
                    <x-form.input-select class="" id="classe_id">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose classe_id</option>
                            <option value="M">Masculin</option>
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                </div>
                <!-- classe -->
                <!-- cost_inscription_id -->
                <div class="space-y-2">
                    <x-form.label for="cost_inscription_id" :value="__('Type cost')" />
                    <x-form.input-select class=" " id="cost_inscription_id">
                        <x-form.input-with-icon-wrapper class="flex">
                            <x-slot name="icon">
                                <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <option selected class="ml-4">Choose cost_inscription_id</option>
                            <option value="M">Masculin</option>
                        </x-form.input-with-icon-wrapper>
                    </x-form.input-select>
                </div>
                <!-- gender -->

            </div>
            <div class="mt-4 ml-4">
                <x-button class="justify-center  gap-2">
                    <x-heroicon-o-pencil-alt class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Create') }}</span>
                </x-button>
            </div>
        </form>
    </div>



</div>
