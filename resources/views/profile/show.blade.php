{{-- <x-app-layout>
    <div class="bg-gray-100 text-center">

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <header class="mt-44 mb-20">
                <div class="py-6 px-4 sm:px-6 lg:items-center ">
                    <h1 class="text-3xl font-bold text-green-300 text-center">Perfil</h1>
                </div>
            </header>


            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
    
                <x-jet-section-border />
            @endif
    
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
    
                <x-jet-section-border />
            @endif
    
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
    
                <x-jet-section-border />
            @endif
    
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
    
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />
    
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')
@section('title', 'Perfil')

@section('content')

    <!-- Contendor del contenido -->
    <div class="sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
            <div class="p-1 sm:px-3 md:px-8 lg:px-20 xl:px-52 2xl:px-96 lg:items-center bg-white m-auto mx-4">
                <div class="bg-white px-1 mb-32">
                    <header class="mb-lg">
                        <div class="py-6 px-4 sm:px-6 lg:items-center ">
                            <h1 class="text-3xl py-20 font-bold text-green-300 text-center">Perfil</h1>
                        </div>
                    </header>
                @auth

                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')

                        <x-jet-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>

                        <x-jet-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-jet-section-border />
                    @endif

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-jet-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif

                @endauth
            </div>
        </div>
    </div>

@endsection