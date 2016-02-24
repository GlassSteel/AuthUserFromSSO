<?php
namespace glasteel;

class AuthUserFromSSO
{
    protected $auth_user = null;

    public function userGS($user_obj=null){
        //getter
        if ( $user_obj === null ){
            return $this->auth_user;
        }
        //setter
        $this->auth_user = $user_obj;
    }//user()

    public function __get($property){
        if( is_object($this->auth_user) ){
            return $this->auth_user->$property;
        }
        return false;
    }//__get()
    
    public function __call($method,$args){
        if( is_object($this->auth_user) ){
            return call_user_func_array([$this->auth_user,$method],$args);
        }
        return false;
    }//__call()

    public function getPID(){
        $pid = ( isset($_SERVER['pid']) ) ? $_SERVER['pid'] : false;
        return $this->validatePID($pid);
    }//getPID()

    public function validatePID($pid){
        if(
            $pid                                //not falsey
            && preg_match('/^[0-9]*$/', $pid)   //all numerals
            && strlen($pid) == 9 &&             //9 digits
            $pid[0] == '7'                      //starts with 7
        ){
            return $pid;
        }
        return false;
    }//validatePID()

}//class AuthUserFromSSO
