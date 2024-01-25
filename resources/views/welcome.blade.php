<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <livewire:styles />
    @vite('resources/css/app.css')
</head>
  <body>
    @section('header')
    @endsection

    <livewire:header />

    <div class="w-full flex items-center justify-center">
      @livewire('search-bar', [])
    </div>


    <livewire:pal-list :pals="[]" />
  </body>
  @livewireScripts
  <script>
    document.addEventListener('livewire:load', function () {
        console.log(Livewire);
        Livewire.on('queryStringUpdated', params => {
            console.log(params);
            const url = new URL(window.location);
            Object.keys(params).forEach(key => url.searchParams.set(key, params[key]));
            history.pushState(null, '', url);
        });
    });
</script>
</html>
