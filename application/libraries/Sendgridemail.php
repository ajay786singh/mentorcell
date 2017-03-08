<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require("sendgrid-php/sendgrid-php.php");


class Sendgridemail
{

    protected $auth_id;
    protected $auth_token;
    protected $end_point;
    protected $api_version;

    public function __construct()
    {
        $this->_ci = & get_instance();

        /*
         * Load config items
         */
        $this->_ci->load->config('email');

        $this->api_key = $this->_ci->config->item('API_KEY');

        $this->from_email = $this->_ci->config->item('FROM_EMAIL');
		
		$this->from_name = $this->_ci->config->item('FROM_NAME');

 
    }


    /**
     * Send an Email message
     * @param array $sms_data
     * @return type 
     */
    public function send_email($email_data)
    {
        $from = new SendGrid\Email($this->from_name,  $this->from_email);
		$subject = $email_data['subject'];
		$to = new SendGrid\Email(null, $email_data['to']);
		$content = new SendGrid\Content("text/plain", $email_data['message']);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);

		$apiKey = $this->api_key;
		$sg = new \SendGrid($apiKey);

		$response = $sg->client->mail()->send()->post($mail);
		$response->statusCode();
		$response->headers();
		$response->body();
		return $response->statusCode();
		
    }

  

}

/* End of file Sendgridemail.php */