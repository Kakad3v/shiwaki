@component('mail::message')
# A New Post Awaits Approval 

You have a new article from {{$article->user->name}}
that awaits approval.

It was published {{$article->created_at->diffForHumans()}} ago.

The link is below

@component('mail::button', ['url' => '/{{$artilce->path()}}'])
View Article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
