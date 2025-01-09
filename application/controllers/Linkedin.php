<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinkedIn extends CI_Controller {

    private $clientId;
    private $clientSecret;
    private $redirectUri = 'https://sharksjob.com/linkedin/callback';

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load database
        $this->loadCredentials(); // Load credentials from the database
    }

    private function loadCredentials() {
        // Fetch LinkedIn API credentials from the database
        $query = $this->db->get_where('api_credentials', ['service' => 'linkedin'], 1);
        $credentials = $query->row_array();

        if ($credentials) {
            $this->clientId = $credentials['client_id'];
            $this->clientSecret = $credentials['client_secret'];
        } else {
            log_message('error', 'LinkedIn API credentials not found in the database.');
            show_error('API credentials are not configured.', 500);
        }
    }

    public function login() {
        // LinkedIn authorization URL
        $authUrl = "https://www.linkedin.com/oauth/v2/authorization";
        $params = [
            "response_type" => "code",
            "client_id" => $this->clientId,
            "redirect_uri" => $this->redirectUri,
            "scope" => "r_liteprofile r_emailaddress"
        ];

        // Redirect user to LinkedIn for authentication
        redirect($authUrl . '?' . http_build_query($params));
    }

    public function callback() {
        // Retrieve the authorization code
        $code = $this->input->get('code');
        if (!$code) {
            log_message('error', 'Authorization code not received.');
            redirect(base_url('login'));
        }

        // Exchange the authorization code for an access token
        $tokenUrl = "https://www.linkedin.com/oauth/v2/accessToken";
        $postData = [
            "grant_type" => "authorization_code",
            "code" => $code,
            "redirect_uri" => $this->redirectUri,
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $tokenUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);
        if (!isset($responseData['access_token'])) {
            log_message('error', 'Failed to obtain access token.');
            redirect(base_url('login'));
        }

        $accessToken = $responseData['access_token'];

        // Fetch user profile data
        $profile = $this->fetchProfile($accessToken);
        $email = $this->fetchEmail($accessToken);

        if ($profile && $email) {
            // Save user data to session or database
            $userData = [
                'id' => $profile['id'],
                'firstName' => $profile['localizedFirstName'],
                'lastName' => $profile['localizedLastName'],
                'email' => $email
            ];

            $this->session->set_userdata('linkedin_user', $userData);
            redirect(base_url('candidate_profile/index'));
        } else {
            redirect(base_url('Recruitment'));
        }
    }

    private function fetchProfile($accessToken) {
        $url = "https://api.linkedin.com/v2/me";
        $headers = [
            "Authorization: Bearer $accessToken"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    private function fetchEmail($accessToken) {
        $url = "https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))";
        $headers = [
            "Authorization: Bearer $accessToken"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['elements'][0]['handle~']['emailAddress'] ?? null;
    }
}
