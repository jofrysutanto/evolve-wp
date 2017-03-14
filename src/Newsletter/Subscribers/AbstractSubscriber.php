<?php
namespace App\Newsletter\Subscribers;

abstract class AbstractSubscriber 
{

    /**
     * Subscribe given email to newsletter service
     *
     * @param  string $email     User's email address
     * @param  string $listId    Unique list id
     * @param  array  $variables Additional parameters
     *
     * @return boolean
     */
    abstract public function subscribe($email, $listId, $variables);

}