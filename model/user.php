<?php 


class user {

    private ?int $idUser = null;
    private ?string $username = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $user_type= null;
    private ?string $image=null;
    
    public function __construct($id = null, $un, $em, $p, $ut, $im)
    {
        $this->idUser = $id;
        $this->username = $un;
        $this->email = $em;
        $this->password = $p;
        $this->user_type=$ut;
        $this->image= $im;
     
    }

    /**
     * Get the value of iUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
/**Get the value of an image
 * 
 */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of an image
     */
    
    public function setImage($image)
    {
        $this->image=$image;
       
        return $this;
    }

     /**
     * Get the value of username
     */
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUserName($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of address
     */
   
    /**
     * Get the value of dob
     */
    public function getPw()
    {
        return $this->password;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setPw($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getUsertype(){
        return $this->user_type;
    }

    public function setUsertype($user_type){
        $this->user_type = $user_type;
        return $this;
    }
}




?>