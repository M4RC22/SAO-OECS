@component('mail::panel')
# New Student Organization!

There is a new student organization application.
<br>
<br>
To proceed in reviewing the application, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/applicants'])
Applicants
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent