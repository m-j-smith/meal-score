@component('mail::message')
# You've been invited to {{ $diningTableName }}
 
You've been invited to join **{{ $diningTableName }}** on Meal Score.
 
@component('mail::button', ['url' => $acceptUrl])
Join {{ $diningTableName }}
@endcomponent
 
If you don't have an account yet, this link will take you to sign up first — you'll join the table automatically once you're registered.
 
If you already have an account, just log in and you'll be added to the table straight away.
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent