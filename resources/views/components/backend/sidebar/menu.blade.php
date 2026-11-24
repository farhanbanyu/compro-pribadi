@foreach ($feature as $e)
    @if (in_array($e->id, json_decode($authority->code, true)))
        <li class="@if (Route::currentRouteName() == $key) active @endif">
            <a href="{{ $url }}"><i
                    class="{{ $icon ? $icon : 'fa fa-circle' }}"></i><span>{{ $e->title }}</span></a>
        </li>
    @endif
@endforeach
