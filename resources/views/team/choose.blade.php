@php
if (Session::has('team'))
{
	header("Location: " . URL::to('/scanner'), true, 302);
    exit();
}
@endphp

<x-app-layout>
	<x-slot name="header">
	<div class="inline-block grow">
			<h2 class="py-2 font-black font-serif text-3xl">
				QR Code Hunt
			</h2>
		</div>
	</x-slot>

	<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					@if ($errors->any())
					<div class="rounded block my-3 p-4 bg-red-100">Team not created.</div>
						@foreach ($errors->all() as $error)
							<div class="rounded block my-3 p-4 bg-red-100">{{ $error }}</div>
						@endforeach
					@endif

                    <h1 class="font-black text-5xl font-serif text-black">Choose your Team</h1>
					<div class="mt-4 max-w-md">
						@foreach ($teams as $team)
							<div class="block my-3">
								<a class="mt-4 bg-scout-purple hover:bg-gray-100 text-white hover:text-scout-purple transition font-extrabold py-2 px-4 rounded inline-block font-serif" href="/team/{{$team->id}}">{{$team->name}}</a>
							</div>
						@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>