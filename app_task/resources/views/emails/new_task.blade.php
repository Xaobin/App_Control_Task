@component('mail::message')
# {{ $task }}

Limit of conclusion: {{ $date_limit_conclusion }}

@component('mail::button', ['url' => $url])
Cick to see the task
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent