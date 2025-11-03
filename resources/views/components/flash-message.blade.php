@if(session('success') || session('error'))
    @php
        $type = session('success') ? 'success' : 'danger';
        $message = session('success') ?? session('error');
    @endphp

    <div id="flash-message" class="alert alert-{{ $type }} position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050;">
        {{ $message }}
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.classList.add('fade');
                    setTimeout(() => flash.remove(), 500);
                }, 3000);
            }
        });
    </script>
@endif
