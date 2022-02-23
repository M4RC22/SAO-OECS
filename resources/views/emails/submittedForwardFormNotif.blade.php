@component('mail::message')
# You received a form.

@component('mail::panel')
There is a form that needs an approval.

<br>
<br>
Kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/submittedForms'])
View Submission
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent
