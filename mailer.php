<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$content = $_POST['enquiry'];

class MailScript
{
    private $name;
    private $email;
    private $phone_no;
    private $content;
  
    private $forward_email = 'lancswolf@gmail.com';
    private $subject = 'Website Message';
  
    public function __construct($name, $email, $phone_no, $content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone_no = $phone_no;
        $this->content = $content;
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
        $message = "
        You have recieved a new message from your website.

        Name: $this->name
        Email: $this->email
        Phone: $this->phone_no

        Message:
        $this->content
        
        ";
        return $message;
    }
  
    public function __destruct()
    {
        mail($this->forward_email, $this->subject, $this->createMessage(), $this->createHeaders());
        header('Location: ./index.php');
    }
}

$mail = new MailScript($name, $email, $phone_no, $content);


