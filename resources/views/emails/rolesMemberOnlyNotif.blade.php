@component('mail::message')
# <p class="successform">Congratulations!</p>
<br>
You have been added to <b>{{$orgName[0]}}</b> as <b>{{$emailData['position']}}</b>!

@component('mail::panel')
To view your student organization, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/roles'])
View Organization
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent