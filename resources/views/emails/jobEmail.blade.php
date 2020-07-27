@component('mail::message')

Hi {{$data['receiver_name']}}, {{$data['sender_name']}} from {{$data['sender_email']}} 
has sent you a job posting.

@component('mail::button', ['url' => '$data['jobUrl']')
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
