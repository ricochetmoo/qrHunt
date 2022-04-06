<x-app-layout>
	<x-slot name="header">
	<div class="inline-block grow">
			<h2 class="py-2 font-black text-3xl">
				QR Code Hunt
			</h2>
		</div>
	</x-slot>

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					@foreach ($teams as $team)
						<div>
						<h2 class="py-2 font-black text-3xl">
							{{$team->name}}
						</h2>
						<h3 class="py-2 font-black text-2xl">
							Last seen
						</h3>
						<p>
							@if ($team->scans->sortByDesc('location_team.created_at')->first()) {{$team->scans->sortByDesc('location_team.created_at')->first()->name}} at {{$team->scans->sortByDesc('location_team.created_at')->first()->location_team.created_at}} @endif
						</p>
						<h3 class="py-2 font-black text-2xl">
							Joe's car
						</h3>
						<p>
							{{$team->joes_car}}
						</p>
						<h3 class="py-2 font-black text-2xl">
							Next scan
						</h3>
						<p>
							{{$team->next->name}} ({{$team->next->id}})
						</p>
						<h3 class="py-2 font-black text-2xl">
							First scan
						</h3>
						<p>
							{{$team->start->name}} ({{$team->start->id}})
						</p>
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>