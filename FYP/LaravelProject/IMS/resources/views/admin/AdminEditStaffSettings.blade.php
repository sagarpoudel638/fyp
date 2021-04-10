
 @extends('MasterAdmin')
 @section('container')


<div class="form__group field">
    <input type="text" class="form__field" placeholder="Name Of User" name="name"  required />
    <label for="name" class="form__label">Name Of User</label>
    <span class="text-danger">@error('name'){{ $message}} @enderror </span>
</div>
<div class="form__group field">
    <input type="text" class="form__field" placeholder="Email" name="email"  required />
    <label for="name" class="form__label">Email</label>
    <span class="text-danger">@error('email'){{ $message}} @enderror </span>
</div>

@endsection
