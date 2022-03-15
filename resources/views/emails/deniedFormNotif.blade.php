@component('mail::message')
# <p class="deny">Form Denied.</p>
<br>
The <b>{{$formType}} Form</b> has been denied.

@component('mail::panel')
Kindly edit the neccessary details based on this feedback:<br>
<br>
<b>{{$feedback}}</b>
<br>
<br>
To edit the <b>{{$formType}} Form</b>, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
Review
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent