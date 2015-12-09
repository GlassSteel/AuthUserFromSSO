<?php
namespace glasteel;

class AuthUserFromSSO
{
    protected $auth = null;

    public function __construct()
    {
        //global $app;
        if ($this->auth !== null){
            return ($this->auth === false) ? false : true;
        }
        // switch ($app->settings['SLIM_MODE']){
        //     case 'local':
        //         $pid = 714623825; //TODO mechanism to set spoof pid
        //         $user = \R::findOne('user','unc_pid = :unc_pid',[
        //             'unc_pid' => $pid
        //         ]);
        //         break;   

        //     //TODO development case

        //     //TODO production case

        //     default:
        //         die();//TODO improve error handling
        // }

        $user = new stdclass;
        $user->name = 'Paul';
        $this->auth = $user;
        return true;

        // if ( $user && $user->id ){
        //     try {
        //         $this->auth = new User($user);
        //     } catch (Exception $e) {
        //         pre_r($e->getMessage());   
        //     }
        //     return true;
        // }
        // $this->auth = false;
        // return false;
    }//__construct

    public function getAuthUser()
    {
        return $this->auth;
    }//getAuthUser()

}//class AuthUserFromSSO