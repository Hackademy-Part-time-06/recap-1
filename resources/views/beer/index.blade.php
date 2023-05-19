<x-layout>
  <ul>
    @forelse ($beers as $beer)
    <li>
      <a href="{{route('beer.show',['id' => $beer['id']])}}">
        {{$beer['name']}}
      </a>
    </li>
    @empty
    <li>Nessuna Birra</li>
    @endforelse
  </ul>
</x-layout>