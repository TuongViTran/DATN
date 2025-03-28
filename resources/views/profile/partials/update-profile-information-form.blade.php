<style>
    .profile-container {
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

.profile-form {
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

.verification-message {
    background: #f8f9fa;
    padding: 10px;
    border-left: 4px solid #3498db;
    margin-top: 10px;
    border-radius: 6px;
}

.verification-button {
    background: none;
    border: none;
    color: #2980b9;
    cursor: pointer;
    text-decoration: underline;
    font-size: 14px;
}

.verification-button:hover {
    color: #1f618d;
}

.success-message {
    color: #27ae60;
    font-size: 13px;
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

<section class="profile-container">
    <header>
        <h2 class="section-title">{{ __('Thông tin cá nhân') }}</h2>
        <p class="section-description">
            {{ __("Cập nhật thông tin cá nhân và địa chỉ email của tài khoản của bạn.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">{{ __('Họ và Tên') }}</label>
            <input id="name" name="name" type="text" class="input-field" 
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            <p class="error-message">{{ $errors->first('name') }}</p>
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="input-field" 
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            <p class="error-message">{{ $errors->first('email') }}</p>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="verification-message">
                    <p>{{ __('Địa chỉ email của bạn chưa được xác minh.') }}</p>
                    <button form="send-verification" class="verification-button">
                        {{ __('Nhấn vào đây để gửi lại email xác minh.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="success-message">
                            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="save-button">{{ __('Lưu') }}</button>

            @if (session('status') === 'profile-updated')
                <p class="saved-message" x-data="{ show: true }"
                    x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Đã lưu.') }}
                </p>
            @endif
        </div>
    </form>
</section>
