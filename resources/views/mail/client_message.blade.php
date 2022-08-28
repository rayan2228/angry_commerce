@component('mail::message')
# <h4 style="color: rgb(255, 24, 24)">Attention!!</h4>
 
Your Client {{ $name }} has been sent you a message !
 
@component('mail::panel')
# name = {{ $name }}
# email = {{ $email }}
# subject = {{ $subject }}
# message = {{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent