<?php
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    public function setUp(): void
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->library('form_validation');
        $this->CI->load->helper('url');
        $this->CI->load->model('Menu_model', 'Menu');
        $this->CI->load->database();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // any additional code you want to add to tear down the test
    }

    public function testIndex(): void
    {
        // Ensure that the login form is displayed when the user is not logged in
        $output = $this->request('GET', 'auth/index');
        $this->assertContains('<h1 class="h4 text-gray-900 mb-4">Sign In</h1>', $output);

        // Ensure that the user is redirected to the user page when already logged in
        $this->CI->session->set_userdata('email', 'test@example.com');
        $this->request('GET', 'auth/index');
        $this->assertRedirect('user');
    }

    public function testLogin(): void
    {
        // Ensure that validation errors are shown when form data is missing or invalid
        $this->request('POST', 'auth/index');
        $this->assertContains('Email cannot be empty!', $this->CI->session->flashdata('message'));
        $this->assertContains('Password cannot be empty!', $this->CI->session->flashdata('message'));

        $this->request('POST', 'auth/index', ['email' => 'invalid-email', 'password' => '']);
        $this->assertContains('Invalid email!', $this->CI->session->flashdata('message'));

        // TODO: Add more tests for valid form data and different scenarios
    }

    public function testRegistration(): void
    {
        // Ensure that the registration form is displayed
        $output = $this->request('GET', 'auth/registration');
        $this->assertContains('<h1 class="h4 text-gray-900 mb-4">Create Account</h1>', $output);

        // TODO: Add tests for invalid form data and different scenarios
    }

    public function testVerify(): void
    {
        // TODO: Add tests for different scenarios (e.g. valid/invalid email, valid/invalid token, expired token)
    }

    public function testForgotPassword(): void
    {
        // Ensure that the forgot password form is displayed
        $output = $this->request('GET', 'auth/forgotpassword');
        $this->assertContains('<h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>', $output);

        // TODO: Add tests for invalid form data and different scenarios
    }

    public function testChangePassword(): void
    {
        // TODO: Add tests for invalid form data and different scenarios
    }
}