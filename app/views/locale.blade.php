@foreach($locale as $key=>$value)
    {{ HTML::link('/setLocale/'.$key, $value) }} |
@endforeach