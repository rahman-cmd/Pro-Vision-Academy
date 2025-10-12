@php
$messages = [
    'success' => session('success'),
    'error' => session('error'),
    'status' => session('status'),
];
@endphp

<div class="fixed top-4 right-4 z-50 space-y-3">
    @foreach($messages as $type => $message)
        @if(!empty($message))
            <div class="flash-message max-w-sm px-4 py-3 rounded shadow-lg transition-opacity duration-500
                {{ $type === 'success' ? 'bg-green-600 text-white' : '' }}
                {{ $type === 'error' ? 'bg-red-600 text-white' : '' }}
                {{ $type === 'status' ? 'bg-blue-600 text-white' : '' }}">
                <div class="flex items-start">
                    <div class="mr-3">
                        @if($type === 'success')
                            <i class="fas fa-check-circle"></i>
                        @elseif($type === 'error')
                            <i class="fas fa-exclamation-circle"></i>
                        @else
                            <i class="fas fa-info-circle"></i>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold capitalize">{{ $type }}</p>
                        <p class="text-sm">{{ $message }}</p>
                    </div>
                    <button type="button" class="ml-4 text-white/80 hover:text-white" onclick="this.closest('.flash-message').remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        @endif
    @endforeach

    @if ($errors->any())
        <div class="flash-message max-w-sm px-4 py-3 rounded shadow-lg transition-opacity duration-500 bg-red-600 text-white">
            <div class="flex items-start">
                <div class="mr-3">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="flex-1">
                    <p class="font-semibold">Validation error</p>
                    <p class="text-sm">{{ $errors->first() }}</p>
                </div>
                <button type="button" class="ml-4 text-white/80 hover:text-white" onclick="this.closest('.flash-message').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif
</div>