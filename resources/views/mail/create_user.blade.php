@component('mail::message')
# <h4 style="color: rgb(255, 24, 24)">Congratulations</h4>
 
Your account has been created by {{ $created_by }}!
 
@component('mail::panel')
# Email = {{ $email }}
# Password = {{ $password }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent