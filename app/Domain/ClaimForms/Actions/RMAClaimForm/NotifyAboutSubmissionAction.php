<?php

namespace App\Domain\ClaimForms\Actions\RMAClaimForm;

use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;

/**
* Class NotifyAboutSubmissionAction
*
* Send an email to app Admins containing the form details.
*/
class NotifyAboutSubmissionAction
{

    /**
    * @var null
    */
    private $formType = null;

    /**
    * @var null
    */
    private $formData = null;


    /**
    * Sets the form type as "RGA1", "RGA2", or "RMA"
    */
    public function setFormType($formType) : self
    {
        $this->formType = $formType;

        return $this;
    }
    /**
    * Sets the form data.
    */
    public function setFormData($formData) : self
    {
        $this->formData = $formData;

        return $this;
    }

    /**
    * Send an email to app Admins containing the form details.
    *
    * @return mixed
    */
    public function notify()
    {
        Mail::send('mail.rma-form', ['input' => $this->formData], function ($message) {
            $message->to(config('claim-forms.ADMIN_MAIL'))
            ->subject('Noritz RMA Form Submission');
        });
    }
}
