@component('mail::message')
# You received a {{$formType}} Form.
<br>
There's a <b>{{$formType}} Form</b> that needs an approval submitted by <b>{{$orgName}}</b>.

@component('mail::panel')
<h2>Please take note that you only have 3 days to approve.</h2>
<br>
To view the forms, kindly click the button below:
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/submittedForms'])
Pending Forms
@endcomponent

Thanks,<br>
SAO Online Event Creation System
@endcomponent