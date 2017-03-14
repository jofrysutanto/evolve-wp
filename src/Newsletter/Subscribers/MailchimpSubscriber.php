<?php
namespace App\Newsletter\Subscribers;

class MailchimpSubscriber extends AbstractSubscriber
{

    /**
     * This class requires mailchimp to be required as part of composer package
     */

    protected $client;

    public function __construct($config) 
    {
        $this->client = new \Mailchimp($config['api_key']);
    }

    /**
     * Subscribe given email to newsletter service
     *
     * @param  string $email     User's email address
     * @param  string $listId    Unique list id
     * @param  [type] $variables Additional parameters
     *
     * @return boolean
     */
    public function subscribe($email, $listId, $variables)
    {
        try {
            $result = $this->client->lists->subscribe(
                $listId,
                ['email' => $email],
                $variables,
                'html',     // email_type
                false,      // double_optin - sets whether email confirmation is required
                true,       // update_existing
                true        // replace_interests
            );
        } catch(\Exception $e) {
            error_log('A mailchimp error occured: ' . get_class($e) . ' - ' . $e->getMessage());
            // $this->logger->debug('A mailchimp error occured: ' . get_class($e) . ' - ' . $e->getMessage());
            return false;
        }

        return true;
    }

    /**
     * Get underlying mailchimp client
     *
     * @return Milchimp
     */
    public function getClient()
    {
        return $this->client;
    }

}