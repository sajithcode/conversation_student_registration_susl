@if($status=='Accept')
Congratulations your registration is accepted
@endif

@if($status=='Reject')
    Sorry your registration was rejected. Please log in to the convocation registration system, reason will be there. Edit your details and update it.
@endif

@if($status=='Pending')
    Again your registration is in pending stage.
@endif
