@component('mail::message')
Спасибо за регистрацию.

{{$_SESSION['name']}} {{$_SESSION['surname']}}
<br>
{{$_SESSION['date']}}

@endcomponent
