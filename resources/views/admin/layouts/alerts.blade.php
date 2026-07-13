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
            <div class="flash-message admin-toast is-{{ $type }} transition-opacity duration-500">
                <div class="admin-toast__icon">
                    @if($type === 'success')
                        <i class="fas fa-check"></i>
                    @elseif($type === 'error')
                        <i class="fas fa-exclamation"></i>
                    @else
                        <i class="fas fa-info"></i>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold capitalize text-sm text-[var(--admin-ink)]">{{ $type }}</p>
                    <p class="text-sm text-[var(--admin-muted)]">{{ $message }}</p>
                </div>
                <button type="button" class="text-[var(--admin-muted)] hover:text-[var(--admin-ink)]" onclick="this.closest('.flash-message').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    @endforeach

    @if (isset($errors) && $errors->any())
        <div class="flash-message admin-toast is-error transition-opacity duration-500">
            <div class="admin-toast__icon"><i class="fas fa-exclamation"></i></div>
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-sm text-[var(--admin-ink)]">Validation error</p>
                <p class="text-sm text-[var(--admin-muted)]">{{ $errors->first() }}</p>
            </div>
            <button type="button" class="text-[var(--admin-muted)] hover:text-[var(--admin-ink)]" onclick="this.closest('.flash-message').remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>
