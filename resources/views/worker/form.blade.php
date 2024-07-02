<!-- resources/views/worker/form.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Worker Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('worker.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-label for="profile_picture" value="{{ __('Profile Picture') }}" />
                        <x-input id="profile_picture" class="block mt-1 w-full" type="file" name="profile_pictures" required />
                    </div>
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                    </div>
                    <div>
                        <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required />
                    </div>
                    <div>
                        <x-label for="specialty" value="{{ __('Specialty') }}" />
                        <x-input id="specialty" class="block mt-1 w-full" type="text" name="specialty" required />
                    </div>
                    <div>
                        <x-label for="id_number" value="{{ __('ID Number') }}" />
                        <x-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" required />
                    </div>
                    <div>
                        <x-label for="age" value="{{ __('Age') }}" />
                        <x-input id="age" class="block mt-1 w-full" type="number" name="age" required />
                    </div>
                    <div>
                        <x-label for="certificate_of_good_conduct" value="{{ __('Certificate of Good Conduct') }}" />
                        <x-input id="certificate_of_good_conduct" class="block mt-1 w-full" type="file" name="certificate_of_good_conduct" required />
                    </div>
                    <div>
                        <x-label for="recommendation_letter" value="{{ __('Recommendation Letter') }}" />
                        <x-input id="recommendation_letter" class="block mt-1 w-full" type="file" name="recommendation_letter" required />
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
