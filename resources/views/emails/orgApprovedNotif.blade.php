@component('mail::message')
# <p class="successform">Congratulations!</p>
<br>
Your student organization application has been approved.

@component('mail::panel')
To view your student organization, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
View Organization
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent