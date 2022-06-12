<footer class="footer pt-3">
    <div class="container">
        <div class="row">
            @php
                echo $setting->footer ?? '';
            @endphp
        </div>
    </div>
    <div class="copyright">
        <div class="text-center pt-3 pb-2">
            {{ $setting->copyright ?? '' }}
        </div>
    </div>
</footer>
