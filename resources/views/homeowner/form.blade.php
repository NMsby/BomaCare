<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homeowner Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('homeowner.save') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Add form fields for homeowner details -->
                    <div>
                        <x-label for="profile_picture" value="{{ __('Profile Photo') }}" />
                        <x-input id="profile_picture" class="block mt-1 w-full" type="file" name="profile_picture" required />
                    </div>
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                    </div>
                    <div>
                        <x-label for="location" value="{{ __('Location') }}" />
                        <x-input id="location" class="block mt-1 w-full" type="text" name="location" required />
                    </div>
                    <div>
                        <x-label for="age" value="{{ __('Age') }}" />
                        <x-input id="age" class="block mt-1 w-full" type="number" name="age" required />
                    </div>
                    <div>
                        <x-label for="gender" value="{{ __('Gender') }}" />
                        <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" required />
                    </div>
                    <div>
                        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required />
                    </div>
                    <div>
                        <x-label for="id_number" value="{{ __('ID Number/Passport Number') }}" />
                        <x-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" required />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
