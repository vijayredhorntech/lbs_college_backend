<x-app-layout>
    <div class="px-4 py-8 w-full">

        <x-dashboard.welcome-banner/>

        <div class="">
            @role('admin')
            <livewire:dashboard-cards/>
            @endrole

            @role('teacher')
                <livewire:faculty-dashboard-card />
            @endrole

        </div>
    </div>
</x-app-layout>
