<x-mail::message>
<h1>Contact us Message</h1>
<p>From: <span class="text-capitalize">{{$body['first_name']}}</span> <span class="text-capitalize">{{$body['last_name']}}</span>  </p>
<p>Email: {{$body['email']}}</p>
<p>Phone number: {{$body['phone']}}</p>
<p>Message: {{$body['message']}} </p>
</x-mail::message>
