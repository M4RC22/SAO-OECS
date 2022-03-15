@component('mail::message')
# <p class="deny">Application Denied.</p>
<br>
Your student organization application was denied.

@component('mail::panel')
If you wish to apply for an student organization again, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
Apply Organization
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent