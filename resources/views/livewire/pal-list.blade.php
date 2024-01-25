<div class="container px-5 py-24 mx-auto full items-center justify-center">
  <div class="flex flex-wrap -m-4 grow justify-center">
    @foreach ($pals as $pal)
      @livewire('item-pic', ['data' => $pal])
    @endforeach
  </div>
</div>
