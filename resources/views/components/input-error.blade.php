@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
            <p style="color: red; font-size: 15px">{{ $message }}</p>
        @endforeach
@endif
