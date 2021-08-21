<h3>SSG Election Verification</h3>
<p>
    You have received this email because your email address has been used
    for the verification process of the Online SSG Election of Mater Dei College.
    If you did not execute this process, please just ignore this message.
</p>
<p>
    However, if you are the one who performed this verification, please click on the link
    below to verify your account. During the account verification you will be asked to
    enter a password in order for you to have access to the Online SSG Election of Mater Dei College.
</p>
<p>
    Here are the information that was entered in the verification:
    <table class="table table-bordered table-sm">
        <tr>
            <th>ID Number</th><td>{{$user->idnum}}</td>
        </tr>
        <tr>
            <th>Last Name</th><td>{{$user->lname}}</td>
        </tr>
        <tr>
            <th>First Name</th><td>{{$user->fname}}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{$user->email}}</td>
        </tr>
    </table>
</p>
<p>
    <a href="{{url('/verify-email') . '/' . $user->access_token}}">Please click here to verify</a>
</p>
