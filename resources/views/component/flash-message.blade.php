@if ($message = (Session::get('success') ?? $success ?? ''))
<div class="alert alert-success alert-block notify-message">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = (Session::get('error') ?? $error ?? ''))

<div class="alert alert-danger alert-block notify-message">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = (Session::get('warning') ?? $warning ?? ''))
<div class="alert alert-warning alert-block notify-message">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = (Session::get('info') ?? $info ?? ''))
<div class="alert alert-info alert-block notify-message">
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())

<div class="alert alert-danger alert-block notify-message">
    Please check the form below for errors
</div>
@endif