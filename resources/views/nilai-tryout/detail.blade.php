<div>

    @if (!$isAdmin)
    <div class="py-10 mt-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white p-4 mx-4 rounded-lg mb-3">
                @include('nilai-tryout._student')
            </div>
        </div>
    </div>
    @else
    <livewire:nilai-tryout.detail-admin :batch="$batch" />
    @endif
</div>