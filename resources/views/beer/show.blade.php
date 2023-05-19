<x-layout>
  <div class="card" style="width: 18rem;">
    <img src="{{$beer['image_url']}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$beer['name']}}</h5>
    </div>
  </div>

  <div>

    <div class="container py-4">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{route('beer.send')}}" method="POST">
        @method('POST')
        @csrf
        <input class="form-control" type="hidden" value="{{$beer['name']}}" name="beer_name" />

        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input class="form-control" type="text" placeholder="Nome" name="name" value="{{old('name')}}" />
          @error('name')
          Opps, manca il nome
          @enderror
        </div>

        <!--  -->
        <div class="mb-3">
          <label class="form-label">Telefono</label>
          <input class="form-control" type="text" placeholder="" name="phone" value="{{old('phone')}}" />Telefono
          @error('phone')
          Opps, manca il nome
          @enderror
        </div>
        <!--  -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input class="form-control" type="email" placeholder="Email" name="email" value="{{old('email')}}" />
          @error('email')
          Opps, manca il nome
          @enderror
        </div>
        <!-- -->
        <div class="mb-3">
          <label class="form-label">Messaggio</label>
          <textarea class="form-control" name="message" type="text" placeholder="Messaggio"
            style="height: 10rem;">{{old('message')}}</textarea>
        </div>

        <!--  -->
        <div class="d-grid">
          <button class="btn btn-primary btn-lg" type="submit">Invia</button>
        </div>

      </form>

    </div>
  </div>
</x-layout>