<?php

namespace Myth\Auth\Controllers;

use Config\Email;
use CodeIgniter\Controller;
use Myth\Auth\Entities\User;

class AuthController extends Controller
{
	protected $auth;
	/**
	 * @var Auth
	 */
	protected $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');
		// $this->validation = service('validation');

		$this->config = config('Auth');
		$this->auth = service('authentication');
	}

	//--------------------------------------------------------------------
	// Login/out
	//--------------------------------------------------------------------

	/**
	 * Displays the login form, or redirects
	 * the user to their destination/home if
	 * they are already logged in.
	 */
	public function login()
	{
		// No need to show a login form if the user
		// is already logged in.
		if ($this->auth->check()) {
			$redirectURL = session('redirect_url') ?? base_url('/');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}

		// Set a return URL if none is specified
		$_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? base_url('/');

		return view($this->config->views['login'], ['config' => $this->config]);
	}

	/**
	 * Attempts to verify the user's credentials
	 * through a POST request.
	 */
	public function attemptLogin()
	{
		$rules = [
			'login'	=> 'required',
			'password' => 'required'
		];

		if ($this->config->validFields == ['email']) {
			$rules['login'] .= '|valid_email';
		}

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$login = $this->request->getPost('login');
		$password = $this->request->getPost('password');
		$remember = (bool)$this->request->getPost('remember');

		// Determine credential type
		$type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		// Try to log them in...
		if (!$this->auth->attempt([$type => $login, 'password' => $password], $remember)) {
			return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
		}

		// Is the user being forced to reset their password?
		if ($this->auth->user()->force_pass_reset === true) {
			return redirect()->to(base_url('/reset-password') . '?token=' . $this->auth->user()->reset_hash)->withCookies();
		}

		$redirectURL = session('redirect_url') ?? base_url('/');
		unset($_SESSION['redirect_url']);

		// return redirect()->to($redirectURL)->withCookies()->with('message', lang('Auth.loginSuccess'));

		if ($type) {
			session()->setFlashdata('success', lang('Auth.loginSuccess'));
			// return redirect()->to($redirectURL)->withCookies();
			return redirect()->back()->withCookies();
		}
	}

	/**
	 * Log the user out.
	 */
	public function logout()
	{
		if ($this->auth->check()) {
			$this->auth->logout();
		}

		session()->setFlashdata('success', 'Anda berhasil logout. Semoga hari Mu menyenangkan ^_^');
		return redirect()->to(base_url('/'));
	}

	//--------------------------------------------------------------------
	// Register
	//--------------------------------------------------------------------

	/**
	 * Displays the user registration page.
	 */
	public function register()
	{
		// check if already logged in.
		if ($this->auth->check()) {
			return redirect()->back();
		}

		// Check if registration is allowed
		if (!$this->config->allowRegistration) {
			return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
		}

		return view($this->config->views['register'], ['config' => $this->config]);
	}

	/**
	 * Attempt to register a new user.
	 */
	public function attemptRegister()
	{
		helper(['form', 'url']);

		// Check if registration is allowed
		if (!$this->config->allowRegistration) {
			return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
		}

		$users = model('UserModel');

		// Validate here first, since some things,
		// like the password, can only be validated properly here.
		$rules = [
			'username'  => [
				'rules' 	=> 'required|alpha_numeric|min_length[3]|max_length[15]|is_unique[users.username]',
				'errors' 	=> [
					'required'		=> 'Username harus di isi',
					'alpha_numeric' => 'Username tidak boleh spesial',
					'min_length'	=> 'Username minimal 3 karakter',
					'max_length'	=> 'Username maximal 15 karakter',
					'is_unique'		=> 'Username sudah terdaftar'
				]
			],
			'email'		=> [
				'rules' 	=> 'required|valid_email|is_unique[users.email]',
				'errors'	=> [
					'required'		=> 'Email harus di isi',
					'valid_email'	=> 'Email tidak valid',
					'is_unique'		=> 'Email sudah terdaftar'
				]
			],
			'password'	 => [
				'rules'		=> 'required|strong_password',
				'errors'	=> [
					'required'		=> 'Password harus di isi',
					'strong_password'	=> 'Password terlalu mudah',
				]
			],
			'pass_confirm' => [
				'rules'		=> 'required|matches[password]',
				'errors'	=> [
					'required'		=> 'Repeat Password harus di isi',
					'matches'		=> 'Password tidak sesuai',
				]
			],
			'nik'		=> [
				'rules' 	=> 'required|numeric|min_length[16]|max_length[16]|is_unique[users.nik]',
				'errors'	=> [
					'required'		=> 'NIK harus di isi',
					'numeric'		=> 'NIK harus angka',
					'min_length'	=> 'NIK harus 16 digit',
					'max_length'	=> 'NIK harus 16 digit',
					'is_unique'		=> 'NIK sudah terdaftar'
				]
			],
			'fullname'	=> [
				'rules' 	=> 'required|alpha_space',
				'errors'	=> [
					'required'		=> 'Nama harus di isi',
					'alpha_space'	=> 'Nama tidak boleh spesial'
				]
			],
			'no_hp'		=> [
				'rules' 	=> 'required|numeric|min_length[11]|max_length[13]',
				'errors'	=> [
					'required'		=> 'No HP harus di isi',
					'numeric'		=> 'No HP harus angka',
					'min_length'	=> 'No HP terlalu pendek',
					'max_length'	=> 'No HP terlalu panjang'
				]
			],
			'alamat'		=> [
				'rules' 	=> 'required|min_length[20]',
				'errors'	=> [
					'required'		=> 'Alamat harus di isi',
					'min_length'	=> 'Alamat kurang lengkap'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
		}


		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		// dd($allowedPostFields);
		$user = new User($this->request->getPost($allowedPostFields));

		$this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

		// Ensure default group gets assigned if set
		if (!empty($this->config->defaultUserGroup)) {
			$users = $users->withGroup($this->config->defaultUserGroup);
		}

		if (!$users->save($user)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
		}

		if ($this->config->requireActivation !== false) {
			$activator = service('activator');
			$sent = $activator->send($user);

			if (!$sent) {
				return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
			}

			// Success!
			return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
		}

		// Success!
		// return redirect()->route('login')->with('success', lang('Auth.registerSuccess'));

		// Success!
		if ($user) {
			session()->setFlashdata('message', lang('Auth.registerSuccess'));
			return redirect()->route('login');
		}
	}

	//--------------------------------------------------------------------
	// Forgot Password
	//--------------------------------------------------------------------

	/**
	 * Displays the forgot password form.
	 */
	public function forgotPassword()
	{
		if ($this->config->activeResetter === false) {
			return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
		}

		return view($this->config->views['forgot'], ['config' => $this->config]);
	}

	/**
	 * Attempts to find a user account with that password
	 * and send password reset instructions to them.
	 */
	public function attemptForgot()
	{
		if ($this->config->activeResetter === false) {
			return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
		}

		$users = model('UserModel');

		$user = $users->where('email', $this->request->getPost('email'))->first();

		// dd($user);

		if (is_null($user)) {
			return redirect()->back()->with('error', 'Maaf, Email tidak terdaftar');
		}

		// Save the reset hash /
		$user->generateResetHash();
		$users->save($user);

		$resetter = service('resetter');
		$sent = $resetter->send($user);

		if (!$sent) {
			return redirect()->back()->withInput()->with('error', $resetter->error() ?? lang('Auth.unknownError'));
		}

		// return redirect()->route('reset-password')->with('message', lang('Auth.forgotEmailSent'));

		if ($sent) {
			session()->setFlashdata('message', 'Token keamanan sudah dikirim ke email kamu, silahan cek email mu.');
			return redirect()->route('reset-password');
		}
	}

	/**
	 * Displays the Reset Password form.
	 */
	public function resetPassword()
	{
		if ($this->config->activeResetter === false) {
			return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
		}

		$token = $this->request->getGet('token');

		return view($this->config->views['reset'], [
			'config' => $this->config,
			'token'  => $token,
		]);
	}

	/**
	 * Verifies the code with the email and saves the new password,
	 * if they all pass validation.
	 *
	 * @return mixed
	 */
	public function attemptReset()
	{
		if ($this->config->activeResetter === false) {
			return redirect()->route('login')->with('error', lang('Auth.forgotDisabled'));
		}

		$users = model('UserModel');

		// First things first - log the reset attempt.
		$users->logResetAttempt(
			$this->request->getPost('email'),
			$this->request->getPost('token'),
			$this->request->getIPAddress(),
			(string)$this->request->getUserAgent()
		);

		$rules = [
			'token'		=> [
				'rules'	=> 'required',
				'errors' => ['required' => 'Token harus diisi.']
			],
			'email'		=> [
				'rules' => 'required|valid_email',
				'errors' => [
					'required'	=> 'Email harus diisi.',
					'valid_email' => 'Email tidak valid.'
				]
			],
			'password'	 => [
				'rules' => 'required|strong_password',
				'errors' => [
					'required'	=> 'Password harus diisi.',
					'strong_password' => 'Password terlalu lemah.'
				]
			],
			'pass_confirm' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Ulangi Password Baru harus diisi.',
					'matches'	=> 'Password tidak sesuai.'
				]
			],
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
		}

		$user = $users->where('email', $this->request->getPost('email'))
			->where('reset_hash', $this->request->getPost('token'))
			->first();

		if (is_null($user)) {
			return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
		}

		// Reset token still valid?
		if (!empty($user->reset_expires) && time() > $user->reset_expires->getTimestamp()) {
			return redirect()->back()->withInput()->with('error', lang('Auth.resetTokenExpired'));
		}

		// Success! Save the new password, and cleanup the reset hash.
		$user->password 		= $this->request->getPost('password');
		$user->reset_hash 		= null;
		$user->reset_at 		= date('Y-m-d H:i:s');
		$user->reset_expires    = null;
		$user->force_pass_reset = false;
		$users->save($user);

		return redirect()->route('login')->with('message', lang('Auth.resetSuccess'));
	}

	/**
	 * Activate account.
	 *
	 * @return mixed
	 */
	public function activateAccount()
	{
		$users = model('UserModel');

		// First things first - log the activation attempt.
		$users->logActivationAttempt(
			$this->request->getGet('token'),
			$this->request->getIPAddress(),
			(string) $this->request->getUserAgent()
		);

		$throttler = service('throttler');

		if ($throttler->check($this->request->getIPAddress(), 2, MINUTE) === false) {
			return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
		}

		$user = $users->where('activate_hash', $this->request->getGet('token'))
			->where('active', 0)
			->first();

		if (is_null($user)) {
			return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
		}

		$user->activate();

		$users->save($user);

		return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
	}

	/**
	 * Resend activation account.
	 *
	 * @return mixed
	 */
	public function resendActivateAccount()
	{
		if ($this->config->requireActivation === false) {
			return redirect()->route('login');
		}

		$throttler = service('throttler');

		if ($throttler->check($this->request->getIPAddress(), 2, MINUTE) === false) {
			return service('response')->setStatusCode(429)->setBody(lang('Auth.tooManyRequests', [$throttler->getTokentime()]));
		}

		$login = urldecode($this->request->getGet('login'));
		$type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$users = model('UserModel');

		$user = $users->where($type, $login)
			->where('active', 0)
			->first();

		if (is_null($user)) {
			return redirect()->route('login')->with('error', lang('Auth.activationNoUser'));
		}

		$activator = service('activator');
		$sent = $activator->send($user);

		if (!$sent) {
			return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
		}

		// Success!
		return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
	}
}
