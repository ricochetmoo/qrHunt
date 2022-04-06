@php
use App\Http\Controllers\TeamController;

if (!Session::has('team'))
{
	header("Location: " . URL::to('/'), true, 302);
    exit();
}

$team = TeamController::findOne(Session::get('team'));
@endphp
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
					@if ($errors->any)
					<div class="rounded block my-3 p-4 bg-red-100">{{$errors->first()}}</div>
					@endif

					<h2 class="py-2 font-black text-3xl">
						Your next clue:
						{{$team->next->hint}}
					</h2>

                    <video id="scanner"></video>
                </div>
            </div>
        </div>
    </div>

	<script type="module">
		import QrScanner from '/js/qr-scanner.min.js';
		const qrScanner = new QrScanner(document.getElementById('scanner'), result => window.location.href='scan/' + result);
		qrScanner.start();
	</script>
</x-app-layout>