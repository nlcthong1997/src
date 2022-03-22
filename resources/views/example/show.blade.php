@include('component.flash-message')

<form method="POST" action="{{ route('example') }}">
    @csrf
    <input type="text" name="input1" id="id1" value="{{ old('input1') }}">
    @error('input1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <br>
    <br>
    <input type="text" name="input2" id="id2" value="{{ old('input2') }}">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>