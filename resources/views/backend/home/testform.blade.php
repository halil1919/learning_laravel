@if($errors->any())

    @foreach($errors->all() as $key)
        {{ $key }} <br>
    @endforeach

@endif

<form action="{{ route('.admin.anasayfapost') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" value="{{ old('ad') }}" name="ad"><br>
    <input type="text" value="{{ old('soyad') }}" name="soyad"><br>
    <input type="submit" value="Gönder">
</form>