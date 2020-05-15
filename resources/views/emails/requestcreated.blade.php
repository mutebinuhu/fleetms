@component('mail::message')
# Introduction
{{$request->name}}


The body of your message.
request is sent

@component('mail::button', ['url' => '/requests/dashboard'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
