<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$message_content = $_POST['message'];

class MailScript
{
    private $name;
    private $email;
    private $phone_no;
    private $message_content;
  
    private $forward_email = '';
    private $subject = 'Website Message';
  
    public function __construct($name, $email, $phone_no, $message_content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone_no = $phone_no;
        $this->message_content = $message_content;
    }
    
    public function createHeaders()
    {
        if (version_compare(PHP_VERSION, '7.2.0') >= 0) {
            $headers = [
              'From' => $this->email
            ];
            return $headers;
        } else {
            return 'From: '.$this->email;
        }
    }
  
    public function createMessage()
    {
        $email_message = "
        You have recieved a new message from your website.

        Name: $this->name
        Email: $this->email
        Phone: $this->phone_no

        Message:
        $this->message_content
        
        ";
        return $email_message;
    }
  
    public function __destruct()
    {
        mail($this->forward_email, $this->subject, $this->createMessage(), $this->createHeaders());
        header('Location: ./index.php');
    }
}

$mail = new MailScript($name, $email, $phone_no, $message_content);


