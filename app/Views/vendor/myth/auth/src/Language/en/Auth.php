<?php

return [
    // Exceptions
    'invalidModel'              => 'The {0} model must be loaded prior to use.',
    'userNotFound'              => 'Unable to locate a user with ID = {0, number}.',
    'noUserEntity'              => 'User Entity must be provided for password validation.',
    'tooManyCredentials'        => 'You may only validate against 1 credential other than a password.',
    'invalidFields'             => 'The "{0}" field cannot be used to validate credentials.',
    'unsetPasswordLength'       => 'You must set the `minimumPasswordLength` setting in the Auth config file.',
    'unknownError'              => 'Sorry, we encountered an issue sending the email to you. Please try again later.',
    'notLoggedIn'               => 'You must be logged in to access that page.',
    'notEnoughPrivilege'        => 'You do not have sufficient permissions to access that page.',

    // Registration
    'registerDisabled'          => 'Sorry, new user accounts are not allowed at this time.',
    'registerSuccess'           => 'Selamat datang! Silahkan login dengan akun yang sudah dibuat',
    // 'registerSuccess'           => 'Welcome aboard! Please login with your new credentials.',
    'registerCLI'               => 'New user created: {0}, #{1}',

    // Activation
    'activationNoUser'          => 'Unable to locate a user with that activation code.',
    'activationSubject'         => 'Activate your account',
    'activationSuccess'         => 'Please confirm your account by clicking the activation link in the email we have sent.',
    'activationResend'          => 'Resend activation message one more time.',
    'notActivated'              => 'This user account is not yet activated.',
    'errorSendingActivation'    => 'Failed to send activation message to: {0}',

    // Login
    // 'badAttempt'                => 'Unable to log you in. Please check your credentials.',
    'badAttempt'                => 'Tidak bisa Login. Silahkan cek kredensial mu.',
    'loginSuccess'              => 'Hallo, Selamat datang kembali!',
    'invalidPassword'           => 'Tidak bisa Login. Silahkan cek password mu.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Resseting password option has been disabled.',
    'forgotNoUser'              => 'Unable to locate a user with that email.',
    'forgotSubject'             => 'Password Reset Instructions',
    // 'resetSuccess'              => 'Your password has been successfully changed. Please login with the new password.',
    'resetSuccess'              => 'Password mu telah berhasil diubah. Silahkan Login menggunakan password baru.',
    'forgotEmailSent'           => 'A security token has been emailed to you. Enter it in the box below to continue.',
    'errorEmailSent'            => 'Unable to send email with password reset instructions to: {0}',

    // Passwords
    // 'errorPasswordLength'       => 'Passwords must be at least {0, number} characters long.',
    'errorPasswordLength'       => 'Password setidaknya harus {0, number} karakter.',
    'suggestPasswordLength'     => 'Pass phrases - up to 255 characters long - make more secure passwords that are easy to remember.',
    // 'errorPasswordCommon'       => 'Password must not be a common password.',
    'errorPasswordCommon'       => 'Password tidak boleh umum.',
    // 'suggestPasswordCommon'     => 'The password was checked against over 65k commonly used passwords or passwords that have been leaked through hacks.',
    'suggestPasswordCommon'     => 'Password diperiksa terhadap lebih dari 65 ribu kali atau Password yang umum digunakan yang telah bocor melalui peretasan.',
    // 'errorPasswordPersonal'     => 'Passwords cannot contain re-hashed personal information.',
    'errorPasswordPersonal'     => 'Password tidak boleh berisi informasi pribadi.',
    // 'suggestPasswordPersonal'   => 'Variations on your email address or username should not be used for passwords.',
    'suggestPasswordPersonal'   => 'Variasi pada alamat email atau nama pengguna Anda tidak boleh digunakan untuk Password.',
    // 'errorPasswordTooSimilar'    => 'Password is too similar to the username.',
    'errorPasswordTooSimilar'    => 'Password terlalu mirip dengan username.',
    // 'suggestPasswordTooSimilar'  => 'Do not use parts of your username in your password.',
    'suggestPasswordTooSimilar'  => 'Jangan gunakan username mu di dalam password.',
    // 'errorPasswordPwned'        => 'The password {0} has been exposed due to a data breach and has been seen {1, number} times in {2} of compromised passwords.',
    'errorPasswordPwned'        => 'Password {0} telah dibongkar karena pelanggaran data dan telah dilihat {1, number} kali dalam {2} password yang dihack.',
    // 'suggestPasswordPwned'      => '{0} should never be used as a password. If you are using it anywhere change it immediately.',
    'suggestPasswordPwned'      => '{0} jangan pernah digunakan sebagai sandi. Jika Anda menggunakannya di mana saja segera ubah.',
    // 'errorPasswordEmpty'        => 'A Password is required.',
    'errorPasswordEmpty'        => 'Password harus diisi.',
    // 'passwordChangeSuccess'     => 'Password changed successfully',
    'passwordChangeSuccess'     => 'Password berhasil diubah',
    // 'userDoesNotExist'          => 'Password was not changed. User does not exist',
    'userDoesNotExist'          => 'Password tidak bisa diubah. User tidak terdaftar',
    // 'resetTokenExpired'         => 'Sorry. Your reset token has expired.',
    'resetTokenExpired'         => 'Maaf, Token kamu sudah kadaluarsa.',

    // Groups
    'groupNotFound'             => 'Unable to locate group: {0}.',

    // Permissions
    'permissionNotFound'        => 'Unable to locate permission: {0}',

    // Banned
    // 'userIsBanned'              => 'User has been banned. Contact the administrator',
    'userIsBanned'              => 'User sudah di banned. Segera kontak administrator',

    // Too many requests
    'tooManyRequests'           => 'Too many requests. Please wait {0, number} seconds.',

    // Login views
    'home'                      => 'Home',
    'current'                   => 'Current',
    'forgotPassword'            => 'Forgot Your Password?',
    'enterEmailForInstructions' => 'No problem! Enter your email below and we will send instructions to reset your password.',
    'email'                     => 'Email',
    'emailAddress'              => 'Email Address',
    'sendInstructions'          => 'Send Instructions',
    'loginTitle'                => 'Login',
    'loginAction'               => 'Login',
    'rememberMe'                => 'Remember me',
    'needAnAccount'             => 'Need an account?',
    'forgotYourPassword'        => 'Forgot your password?',
    'password'                  => 'Password',
    'repeatPassword'            => 'Repeat Password',
    'emailOrUsername'           => 'Email or username',
    'username'                  => 'Username',
    'register'                  => 'Register',
    'signIn'                    => 'Sign In',
    'alreadyRegistered'         => 'Already registered?',
    'weNeverShare'              => 'We\'ll never share your email with anyone else.',
    'resetYourPassword'         => 'Reset Your Password',
    'enterCodeEmailPassword'    => 'Enter the code you received via email, your email address, and your new password.',
    'token'                     => 'Token',
    'newPassword'               => 'New Password',
    'newPasswordRepeat'         => 'Repeat New Password',
    'resetPassword'             => 'Reset Password',
];
