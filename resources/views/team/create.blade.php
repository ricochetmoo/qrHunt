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
					@if ($errors->any())
					<div class="rounded block my-3 p-4 bg-red-100">Team not created.</div>
						@foreach ($errors->all() as $error)
							<div class="rounded block my-3 p-4 bg-red-100">{{ $error }}</div>
						@endforeach
					@endif

                    <h1 class="font-black text-5xl text-black">Add a new Team</h1>
					<div class="mt-4 max-w-md">
						<form action="/admin/team" method="POST" enctype="multipart/form-data">
							@csrf
							
							<label class="font-semibold" for="name">Name</label>
							<input value="{{old('name')}}" id="name" name="name" type="text" class="mt-2 mb-3 block w-full rounded bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 transition" />

							<label class="font-semibold" for="start_location_id">Start Location</label>
							<select value="{{old('start_location_id')}}" id="start_location_id" name="start_location_id" class="mt-2 mb-3 block w-full rounded bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 transition">
								@foreach ($locations as $location)
								<option value="{{$location->id}}">{{$location->name}}</option>
								@endforeach
							</select>

							<button class="mt-4 bg-scout-purple hover:bg-gray-100 text-white hover:text-scout-purple transition font-extrabold py-2 px-4 rounded" role="submit">Submit</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>