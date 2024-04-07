@php
    $currentYear = date("Y");
@endphp

@if($status=='Accept')
    <strong><span style="font-size: larger; color: green;">Congratulations!</span></strong>

    <br><br>

    You have successfully registered to the {{ $currentYear }} General Convocation of Sabaragamuwa University of Sri Lanka.

    <br><br>

    <span style="color: red;">According to the UGC guidelines, you are required to fill the following form to confirm your graduation.</span>

    <br><br>

    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeOrqzF3SfVH8kD_RfW7IMitq4lKq4s4ttiVxBR71rTzbh2xQ/viewform?usp=sf_link">
        <button style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Click Here to Fill Out the Form to Confirm Your Graduation
        </button>
    </a>@endif

@if($status=='Reject')
    <strong><span style="font-size: larger; color: red;">Sorry your registration was rejected. Please log in to the convocation registration system, reason will be there. Edit your details and update it.</span></strong>
@endif

@if($status=='Pending')
    <strong><span style="font-size: larger; color: green;">Again your registration is in pending stage.</span></strong>
@endif
