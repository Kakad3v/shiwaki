@component('mail::message',['articles'=>$articles])
# What's Hot At Shiwaki

Below are the trending articles

{{$articles}}

@component('mail::button', ['url' => 'https://ashmifconsult.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
