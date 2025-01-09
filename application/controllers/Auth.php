<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/m_admin_user'); // Load the model for database operations
    }

    private function getGoogleClientCredentials()
    {
        $credentials = $this->m_admin_user->getGoogleClientCredentials(); // Implement this method in the model
        if (!$credentials) {
            throw new Exception('Google Client credentials not found in the database.');
        }
        return $credentials;
    }

    public function googleLogin()
    {
        // Manually include Google API Client files
        require_once APPPATH . 'third_party/google-api-php-client/vendor/autoload.php';

        // Fetch credentials from the database
        $credentials = $this->getGoogleClientCredentials();

        // Create the Google Client
        $client = new \Google\Client();
        $client->setClientId($credentials['client_id']); // Use database value
        $client->setClientSecret($credentials['client_secret']); // Use database value
        $client->setRedirectUri(base_url('auth/googleCallback'));
        $client->addScope('email');
        $client->addScope('profile');

        // Generate the Google Login URL
        $loginUrl = $client->createAuthUrl();

        // Redirect the user to the Google Sign-In page
        redirect($loginUrl);
    }

    public function googleCallback()
    {
        // Manually include Google API Client files
        require_once APPPATH . 'third_party/google-api-php-client/vendor/autoload.php';

        try {
            // Fetch credentials from the database
            $credentials = $this->getGoogleClientCredentials();

            // Create the Google Client
            $client = new \Google\Client();
            $client->setClientId($credentials['client_id']);
            $client->setClientSecret($credentials['client_secret']);
            $client->setRedirectUri(base_url('auth/googleCallback'));

            // Authenticate the code received from Google
            if ($this->input->get('code')) {
                $token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
                if (isset($token['error'])) {
                    throw new Exception('Error fetching access token: ' . $token['error']);
                }
                $client->setAccessToken($token);

                // Get user information
                $oauth = new \Google\Service\Oauth2($client);
                $userInfo = $oauth->userinfo->get();

                // Extract user information
                $data = [
                    'email' => $userInfo->email,
                    'name' => $userInfo->name,
                    'google_id' => $userInfo->id,
                    'role' => 1032,
                    'status' => 1,
                ];

                // Save user to the database
                $result = $this->m_admin_user->saveUser($data); // Ensure saveUser() is implemented

                if ($result == 'Logged in successfully!') {
                    $this->session->set_flashdata('error', $result); // Use flash data for error
                    redirect('Recruitment'); // Redirect to login page or any other page
                } else {
                    $this->session->set_flashdata('success', $result); // Use flash data for success
                    redirect('candidate_profile/index'); // Redirect to the dashboard
                }
            } else {
                throw new Exception('Google Sign-In failed.');
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
