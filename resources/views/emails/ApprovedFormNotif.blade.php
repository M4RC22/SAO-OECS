@component('mail::message')
# <p class="successform">Approved!</p>

@component('mail::panel')

The form was approved.
<br>
<br>
To view kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/records'])
Records
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent