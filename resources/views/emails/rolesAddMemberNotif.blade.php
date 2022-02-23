@component('mail::message')

# <p class="successform">Congratulations!</p>

@component('mail::panel')
You have been added to the Student Organization as {{ $emailData['position'] }}!
@endcomponent


Thanks,<br>
SAO Online Event Creation System
@endcomponent