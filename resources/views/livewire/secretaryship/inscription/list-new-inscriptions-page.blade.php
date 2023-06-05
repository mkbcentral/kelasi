<div>
    <div class="bg-white">
        <div class="p-6 overflow-hidden  rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold uppercase text-gray-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    {{ __('List of new inscriptions') }}
                </h2>
                <!-- component -->
                <div>
                    <div class="space-y-2 w-80">
                        <x-form.input-with-icon-wrapper>
                            <x-slot name="icon">
                                <x-heroicon-o-search aria-hidden="true" class="w-5 h-5" />
                            </x-slot>
                            <x-form.input withicon id="name" class="block w-full" type="text"
                                wire:model.defer='name' placeholder="{{ __('Search...') }}" />
                        </x-form.input-with-icon-wrapper>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto mt-2">
            <table class="w-full table-auto">
                <thead class="text-xs font-semibold text-gray-400 uppercase bg-gray-50 dark:bg-dark-eval-1">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">N°</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Code</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Name</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Age</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Gender</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-right">Date Insc.</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Actions</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    @foreach ($listNewInscriptions as $index => $inscription)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $index + 1 }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{ $inscription->student->code }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{ $inscription->name }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{ $inscription->date_of_birth }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center">{{ $inscription->gender }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-right">{{ $inscription->created_at->format('d/M/Y') }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-lg text-center">
                                    @livewire('secretaryship.inscription.modals.edit-inscription-modal',['inscription'=>$inscription])
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





</div>
