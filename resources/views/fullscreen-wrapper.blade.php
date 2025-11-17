<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKSE - Fullscreen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 p-0 bg-white" style="overflow: hidden;">
    <div class="relative w-screen h-screen">
        <!-- Fullscreen toggle button (enter only, ESC to exit) -->
        <nav class="absolute top-4 right-4 z-50 flex items-center gap-2">
            <button id="fullscreen-btn" title="Fullscreen (ESC to exit)" class="inline-flex items-center px-3 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-md shadow">
                <svg id="fs-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 3H5a2 2 0 00-2 2v3m0 8v3a2 2 0 002 2h3m8-16h3a2 2 0 012 2v3m0 8v3a2 2 0 01-2 2h-3"/>
                </svg>
            </button>
        </nav>

        <!-- iframe container for page content -->
        <iframe id="content-frame" src="{{ $initialRoute ?? route('landing') }}" class="w-full h-full border-0" style="display: block;"></iframe>
    </div>

    <script>
        (function(){
            const btn = document.getElementById('fullscreen-btn');
            const icon = document.getElementById('fs-icon');
            const frame = document.getElementById('content-frame');

            function isFullscreen() {
                return document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement;
            }

            function requestFS() {
                const el = document.documentElement;
                if (el.requestFullscreen) el.requestFullscreen();
                else if (el.webkitRequestFullscreen) el.webkitRequestFullscreen();
                else if (el.mozRequestFullScreen) el.mozRequestFullScreen();
                else if (el.msRequestFullscreen) el.msRequestFullscreen();
            }

            function updateIcon(){
                if(isFullscreen()){
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M16 3h5v5M8 21H3v-5M21 8V3M3 16v5"/>';
                    btn.title = "Exit fullscreen (or press ESC)";
                    // Sembunyikan tombol saat sudah fullscreen
                    btn.style.display = 'none';
                } else {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3H5a2 2 0 00-2 2v3m0 8v3a2 2 0 002 2h3m8-16h3a2 2 0 012 2v3m0 8v3a2 2 0 01-2 2h-3"/>';
                    btn.title = "Enter fullscreen";
                    // Tampilkan kembali tombol jika bukan fullscreen (misalnya setelah ESC)
                    btn.style.display = 'inline-flex';
                }
            }

            btn.addEventListener('click', function(){
                if(!isFullscreen()){
                    requestFS();
                } else {
                    if (document.exitFullscreen) document.exitFullscreen();
                    else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
                    else if (document.mozCancelFullScreen) document.mozCancelFullScreen();
                    else if (document.msExitFullscreen) document.msExitFullscreen();
                }
            });

            // Handle ESC key to exit fullscreen
            document.addEventListener('keydown', function(e){
                if(e.key === 'Escape' && isFullscreen()){
                    if (document.exitFullscreen) document.exitFullscreen();
                    else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
                    else if (document.mozCancelFullScreen) document.mozCancelFullScreen();
                    else if (document.msExitFullscreen) document.msExitFullscreen();
                }
            });

            // Update icon on fullscreen change
            ['fullscreenchange','webkitfullscreenchange','mozfullscreenchange','MSFullscreenChange'].forEach(evt => {
                document.addEventListener(evt, updateIcon);
            });

            // Handle navigation from inside iframe (target="_parent")
            window.addEventListener('beforeunload', function(e){
                // preserve scroll, etc. (optional)
            });

            // Handle popstate (back button)
            window.addEventListener('popstate', function(e){
                if(e.state && e.state.route){
                    frame.src = e.state.route;
                }
            });

            // Listen for postMessage from iframe to navigate
            window.addEventListener('message', function(e){
                if(e.data && e.data.action === 'navigate'){
                    const newRoute = e.data.route;
                    frame.src = newRoute;
                    history.pushState({route: newRoute}, '', newRoute);
                }
            });

            // initial state
            updateIcon();
        })();
    </script>
</body>
</html>
