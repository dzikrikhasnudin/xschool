<div x-data="{ expanded: false }" class="bg-white p-4 mx-4 rounded-lg mb-3 ">
    <div @click="expanded = ! expanded" class="chapters flex justify-between cursor-pointer focus:bg-none">
        <div class="chapter-title">
            <h3 class="font-bold text-lg">{{ $title }}</h3>
             <div class="flex gap-3">
                <p class="text-sm"><strong>{{ $totalVideo }}</strong> Video</p>
		@isset($totalModul)
	        <p class="text-sm"><strong>{{ $totalModul }}</strong> Modul</p>
		@endisset
            </div>        
	</div>
        <div class="my-auto">
            <button class="rounded-full p-1">
                <i :class="{
                    'fa-circle-chevron-up': expanded,
                    'fa-circle-chevron-down': !
                        expanded
                }"
                    class="fa-solid text-2xl"></i>
            </button>
        </div>
    </div>

    {{ $slot }}

</div>
