<style>
.password-container {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: auto;
}

.section-title {
    font-size: 22px;
    color: #2c3e50;
    font-weight: bold;
}

.section-description {
    font-size: 14px;
    color: #7f8c8d;
    margin-top: 5px;
}

.password-form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

.error-message {
    color: #e74c3c;
    font-size: 12px;
    margin-top: 5px;
}

.form-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
}

.save-button {
    background: #2ecc71;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s;
}

.save-button:hover {
    background: #27ae60;
}

.saved-message {
    color: #7f8c8d;
    font-size: 14px;
}
</style>

<section class="password-container">
    <header>
        <h2 class="section-title">{{ __('Update Password') }}</h2>
        <p class="section-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="password-form">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="input-field" autocomplete="current-password">
            <p class="error-message">{{ $errors->updatePassword->first('current_password') }}</p>
        </div>

        <div class="form-group">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="input-field" autocomplete="new-password">
            <p class="error-message">{{ $errors->updatePassword->first('password') }}</p>
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input-field" autocomplete="new-password">
            <p class="error-message">{{ $errors->updatePassword->first('password_confirmation') }}</p>
        </div>

        <div class="form-actions">
            <button type="submit" class="save-button">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p class="saved-message" x-data="{ show: true }"
                    x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
