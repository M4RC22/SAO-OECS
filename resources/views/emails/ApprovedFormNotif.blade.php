@component('mail::message')
# <p class="successform">Congratulations!</p>
<br>
The <b>{{$formType}} Form</b> has been approved.

@component('mail::panel')
You can now proceed to your event.
<br>
<br>
To view the <b>{{$formType}} Form</b>, kindly click the button below:

@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/records'])
Records
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent